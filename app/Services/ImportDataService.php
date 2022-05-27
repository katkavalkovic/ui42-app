<?php

namespace App\Services;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class ImportDataService {

    public static function import() {
        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://www.e-obce.sk/kraj/NR.html');

        $crawler->filter('div.okres')->filter('a')->each(function ($node) use ($crawler, $client) {
            print $node->text()."\n";
            $link = $crawler->selectLink($node->text())->link();
            $crawler = $client->click($link);

            $crawler->filter('table[cellspacing="3"]')->filter('a')->each(function ($node) use ($crawler, $client) {
                print $node->text()."\n";

                $link = $crawler->selectLink($node->text())->link();
                $crawler = $client->click($link);
                
                $crawler->filter('table[cellspacing="3"][cellpadding="0"]')->first()->each(function ($node) {
                    print $node->html()."\n";
                });

                $crawler->filter('table[cellspacing="3"][cellpadding="0"]')->eq(1)->each(function ($node) {
                    print $node->html()."\n";
                });

            });

        });

    }

}