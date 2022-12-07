<?php

namespace App\Console\Commands;

use App\Imports\ImportUser;
use Illuminate\Console\Command;

class ImportExel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:exel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importing to User data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        (new ImportUser)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }
}
