<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\WilayahSeeder;

class ImportWilayahData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wilayah:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import wilayah data from SQL file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting wilayah data import...');
        
        // Run the seeder
        $seeder = new WilayahSeeder();
        $seeder->setCommand($this);
        $seeder->run();
        
        $this->info('Wilayah data import completed!');
        
        return Command::SUCCESS;
    }
}
