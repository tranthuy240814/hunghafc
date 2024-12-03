<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;
use Goutte\Facades\Goutte;
use Drnxloc\LaravelHtmlDom\HtmlDomParser;
class ScrapePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrape-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $url = 'https://vsports.vn/teams/PLnN1Zkn/members';

        // Get the full HTML content from the Crawler object
        $html = $url->html();
        // Create a new DOMDocument instance
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // Suppress warnings for invalid HTML

        // Load the HTML content into the DOMDocument object
        $dom->loadHTML($html);
//        $rows = $crawler->filter('table tbody tr')->each(function ($node) {
//            return $node->filter('td')->each(function ($td) {
//                return $td->text();
//            });
//        });
//        dd($rows);
//        foreach ($rows as $row) {
//            TableData::create([
//                'column1' => $row[0],
//                'column2' => $row[1],
//            ]);
//        }
//
//        $this->info('Data crawling and saving completed.');

    }


}
