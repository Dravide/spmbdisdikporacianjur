<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class GenerateSitemapCommand extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap for the application';

    public function handle(): void
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Add home page
        $sitemap->add(Url::create(config('app.url'))
            ->setChangeFrequency('daily')
            ->setPriority(1.0));

        // Add static pages
        $staticRoutes = [
            'login',
            'register',
            'lupapassword',
            'unduh',
            'download',
            'berita',
            'jadwal',
            'data-pendaftar',
            'alur-pendaftaran',
        ];

        foreach ($staticRoutes as $route) {
            if (Route::has($route)) {
                $sitemap->add(Url::create(route($route))
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.8));
            }
        }

        // Add dynamic pages
        // Berita detail pages
        try {
            $beritaItems = \App\Models\Berita::all();
            foreach ($beritaItems as $berita) {
                $sitemap->add(Url::create(route('news.detail', $berita->id))
                    ->setChangeFrequency('weekly')
                    ->setPriority(0.7));
            }
        } catch (\Exception $e) {
            $this->warn('Could not add berita pages: ' . $e->getMessage());
        }


        // Save the sitemap
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');
    }
}