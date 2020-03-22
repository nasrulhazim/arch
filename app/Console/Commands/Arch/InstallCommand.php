<?php

namespace App\Console\Commands\Arch;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arch:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Arch';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('key:generate');
        $this->call('storage:link');
        $this->call('reload:cache');
        $this->call('reload:db');
        $this->call('passport:install', [
            '--force' => true,
        ]);
    }
}
