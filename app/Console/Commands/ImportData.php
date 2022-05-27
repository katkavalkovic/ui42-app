<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImportDataService;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data for all cities located in Nitra';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ImportDataService $service)
    {
        $service->import();
    }
}
