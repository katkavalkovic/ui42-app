<?php

namespace App\Services;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Region;
use App\Models\Subdistrict;
use App\Models\City;
use App\Models\Email;

class ImportDataService {

    public static function import() {
        $client = new Client(HttpClient::create(['timeout' => 120]));
        $crawler = $client->request('GET', 'https://www.e-obce.sk/kraj/NR.html');
        $region = Region::firstOrCreate([
            'name' => 'Nitra',
        ]);

        $crawler->filter('div.okres a')->each(function ($node) use ($crawler, $client, $region) {
            // name of the sub-district
            print "Name of the sub-district: ".$node->text()."\n";
            $subdistrict = Subdistrict::firstOrCreate([
                'region_id' => $region->id,
                'name' => $node->text(),
            ]);
            
            $link = $crawler->selectLink($node->text())->link();
            $crawler = $client->click($link);

            $crawler->filter('table[cellspacing="3"] a')->each(function ($node) use ($crawler, $client, $subdistrict) {
                // last-of-type is not implemented...
                if (!str_contains($node->text(), 'Inzercia')) {
                    
                    $city = array();
                    $city['subdistrict_id'] = $subdistrict->id;

                    // name of the city
                    print "Name of the city: ".$node->text()."\n";
                    $city['name'] = $node->text();

                    $link = $node->selectLink($node->text())->link();
                    $crawler = $client->click($link);
                    
                    $address = "";
                    $emails = array();
                    $crawler->filter('table[cellspacing="3"][cellpadding="0"]:first-of-type')
                            ->each(function ($node, $i) use (&$address, &$city, &$emails) {
                                // phone
                                $node->filter('tr:nth-of-type(3) td:nth-of-type(4)')
                                    ->each(function ($node) use (&$city) {
                                        print "Phone: ".$node->text()."\n";
                                        $city['phone'] = $node->text();
                                    });
                                // fax
                                $node->filter('tr:nth-of-type(4) td:nth-of-type(3)')
                                    ->each(function ($node) use (&$city) {
                                        print "Fax: ".$node->text()."\n";
                                        $city['fax'] = $node->text();
                                    });
                                // city hall address: street and number
                                $node->filter('tr:nth-of-type(5) td:nth-of-type(1)')
                                    ->each(function ($node) use (&$address) {
                                        $address = $node->text();
                                    });
                                // email
                                $node->filter('tr:nth-of-type(5) a')
                                    ->each(function ($node) use (&$emails) {
                                        print "Email: ".$node->text()."\n";
                                        array_push($emails, $node->text());
                                    });
                                // city hall address: postalcode and city
                                $node->filter('tr:nth-of-type(6) td:nth-of-type(1)')
                                    ->each(function ($node) use (&$address, &$city) {
                                        $address = $address." ".$node->text();
                                        print "City hall address: ".$address."\n";
                                        $city['city_hall_address'] = $address;
                                    });
                                // web address
                                $node->filter('tr:nth-of-type(6) a')
                                    ->each(function ($node) use (&$city) {
                                        print "Web: ".$node->text()."\n";
                                        $city['web_address'] = $node->text();
                                    });
                                // img
                                // $node->filter('img')
                                //     ->each(function ($node) use (&$city) {
                                //         if (str_contains($node->image()->getUri(), 'erb')) {
                                //             $url = $node->image()->getUri();
                                //             $contents = file_get_contents($url);
                                //             $name = substr($url, strrpos($url, '/') + 1);
                                //             file_put_contents(public_path($name), $contents);
                                //         }
                                //     });
                            });

                    // mayor name
                    $crawler->filter('table[cellspacing="3"][cellpadding="0"]')->eq(1)
                            ->filter('tr')->eq(7)
                            ->filter('td')->eq(1)
                            ->each(function ($node) use (&$city) {
                                print "Mayor name: ".$node->text()."\n";
                                $city['mayor_name'] = $node->text();
                            });

                    print "\n";
                    $city = City::firstOrCreate($city);
                    foreach ($emails as $email) {
                        Email::firstOrCreate([
                            'city_id' => $city->id,
                            'email' => $email,
                        ]);
                    }
                }
            });
        });
    }
}