<?php

namespace App\Services;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class ImportDataService {

    public static function import() {
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://www.e-obce.sk/kraj/NR.html');

        $crawler->filter('div.okres')->filter('a')->each(function ($node) use ($crawler, $client) {
            // name of the sub-district
            print "Name of the sub-district: ".$node->text()."\n";
            
            $link = $crawler->selectLink($node->text())->link();
            $crawler = $client->click($link);

            $crawler->filter('table[cellspacing="3"]')->filter('a')->each(function ($node) use ($crawler, $client) {
                // name of the city
                print "Name of the city: ".$node->text()."\n";

                $link = $crawler->selectLink($node->text())->link();
                $crawler = $client->click($link);
                
                // city hall address, phone, fax, e-mail, web address
                $crawler->filter('table[cellspacing="3"][cellpadding="0"]')->first()
                        ->filter('tr')
                        ->each(function ($node, $i) {
                            // phone
                            if ($i == 4) {
                                print "Phone: ".$node->text()."\n";

                            }
                            // fax
                            if ($i == 5) {
                                $node->filter('td')->eq(2)->each(function ($node) {
                                    print "Fax: ".$node->text()."\n";
                                });
                            }

                            $address = "";
                            if ($i == 6) {
                                // city hall address: street and number
                                $node->filter('td')->eq(0)->each(function ($node) {
                                    $address = $node->text();
                                    // print $node->text()."\n";
                                });
                                // email
                                $node->filter('a')->each(function ($node) {
                                    print "Email: ".$node->text()."\n";
                                });
                            }

                            if ($i == 7) {
                                // city hall address: postal code and city
                                $node->filter('td')->eq(0)->each(function ($node) use ($address) {
                                    $address = $address.$node->text();
                                    // print $node->text()."\n";
                                    print "City hall address: ".$address."\n";
                                });
                                // web address
                                $node->filter('a')->each(function ($node) {
                                    print "Web: ".$node->text()."\n";
                                });
                            }
                        });

                // mayor name
                $crawler->filter('table[cellspacing="3"][cellpadding="0"]')->eq(1)
                        ->filter('tr')->eq(7)
                        ->filter('td')->eq(1)
                        ->each(function ($node) {
                            print "Mayor name: ".$node->text()."\n";
                        });
                print "\n";

                // Mayor name (Meno starostu), City hall address (Adresa obecného
                // úradu), Phone (Telefón), Fax, E-mail, Web address (Webová adresa).
            });
        });
    }
}