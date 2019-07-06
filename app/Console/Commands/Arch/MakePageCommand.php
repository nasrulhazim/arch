<?php

namespace App\Console\Commands\Arch;

use Illuminate\Console\Command;

class MakePageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arch:page {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fully setup of index, view, show and edit page.';

    /**
     * Create a new command instance.
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
        $name = $this->argument('name');

        $this->call('make:model', [
            'name'  => 'Models\\' . $name,
            '--all' => true,
        ]);
        $this->call('make:controller', [
            'name'    => 'Api\\' . $name . 'Controller',
            '--model' => 'Models\\' . $name,
        ]);
        $this->call('make:dt', [
            'name'        => $name . 'Datatable',
            'model'       => 'Models\\' . $name,
            'transformer' => 'Datatable\\' . $name . 'Transformer',
        ]);
        $this->call('make:seeder', [
            'name' => $name . 'TableSeeder',
        ]);
        $this->call('make:route', [
            'name' => $name,
        ]);
        $this->call('make:route', [
            'name'  => $name,
            '--api' => true,
        ]);
        $this->call('make:route', [
            'name'         => $name,
            '--breadcrumb' => true,
        ]);
        $this->call('make:view', [
            'name' => $name,
        ]);
        $this->call('make:test', [
            'name' => $name . 'Test',
        ]);
    }
}
