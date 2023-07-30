<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create('https://postalandzipcodes.ph')->writeToFile(public_path('sitemap.xml'));

        // Log log log
        $this->info('📝[Creator] Sitemap generated successfully.');
        Log::info('📝[Creator] Sitemap generated successfully.');

        return Command::SUCCESS;
    }
}
