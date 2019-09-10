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
        // Generate a migration, factory, and resource controller for the model
        $this->createModel();

        // Generate store and update request
        $this->createRequest();
        $this->comment('You need to configure the ' . $this->getInputName() . ' store and update request.');

        // Generate API and Datatable Controller
        $this->createController();

        // Append route to api, databatable and web
        $this->createRoute();

        // Generate a seeder class
        $this->createSeeder();

        // Generate index, show, create, edit and partials/actions view
        $this->createView();

        // Generate test
        $this->createTest();
    }

    private function getInputName()
    {
        return $this->argument('name');
    }

    private function createModel()
    {
        $this->call('make:model', [
            'name'  => 'Models\\' . $this->getInputName(),
            '--all' => true,
        ]);
    }

    private function createRequest()
    {
        $this->call('make:request', [
            'name' => $this->getInputName() . '\\StoreRequest',
        ]);

        $this->call('make:request', [
            'name' => $this->getInputName() . '\\UpdateRequest',
        ]);
    }

    private function createController()
    {
        $this->call('make:controller', [
            'name'    => 'Api\\' . $this->getInputName() . 'Controller',
            '--model' => 'Models\\' . $this->getInputName(),
        ]);
        $this->call('make:dt', [
            'name'        => $this->getInputName() . 'Datatable',
            'model'       => 'Models\\' . $this->getInputName(),
            'transformer' => 'Datatable\\' . $this->getInputName() . 'Transformer',
        ]);
    }

    private function createSeeder()
    {
        $this->call('make:seeder', [
            'name' => $this->getInputName() . 'TableSeeder',
        ]);
    }

    private function createRoute()
    {
        $this->call('make:route', [
            'name' => $this->getInputName(),
        ]);
        $this->call('make:route', [
            'name'  => $this->getInputName(),
            '--api' => true,
        ]);
        $this->call('make:route', [
            'name'         => $this->getInputName(),
            '--breadcrumb' => true,
        ]);
    }

    private function createView()
    {
        $this->call('make:view', [
            'name' => $this->getInputName(),
        ]);
    }

    private function createTest()
    {
        $this->call('make:test-crud', [
            'name'  => $this->getInputName() . 'Test',
            'model' => 'Models\\' . $this->getInputName(),
        ]);
    }
}
