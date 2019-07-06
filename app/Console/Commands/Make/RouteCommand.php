<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {name} 
                    {--a|api : API Route}
                    {--d|datatable : Datatable Route}
                    {--w|web : Web Route}
                    {--b|breadcrumb : Breadcrumb Route}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new route';

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
        file_put_contents(
            $this->getFilePath(),
            $this->getContent(),
            FILE_APPEND | LOCK_EX
        );

        $this->info($this->argument('name') . ' route successfully added.');
    }

    private function getContent()
    {
        $name     = $this->argument('name');
        $basename = class_basename($name);
        $stub     = $this->getStub();

        $find = [
            'ROUTE_NAME', 'NAME', 'URI', 'CONTROLLER',
        ];

        $replace = [
            Str::slug($basename, '.'),
            $name,
            Str::kebab($basename),
            $basename . 'Controller',
        ];

        return str_replace($find, $replace, $stub);
    }

    private function getStub()
    {
        if ($this->option('api')) {
            return file_get_contents(app_path('Console/Commands/stubs/routes/api.stub'));
        }

        if ($this->option('datatable')) {
            return file_get_contents(app_path('Console/Commands/stubs/routes/datatable.stub'));
        }

        if ($this->option('breadcrumb')) {
            return file_get_contents(app_path('Console/Commands/stubs/routes/breadcrumb.stub'));
        }

        return file_get_contents(app_path('Console/Commands/stubs/routes/web.stub'));
    }

    private function getFilePath()
    {
        if ($this->option('api')) {
            return base_path('routes/api/_.php');
        }

        if ($this->option('datatable')) {
            return base_path('routes/dt/_.php');
        }

        if ($this->option('breadcrumb')) {
            return base_path('routes/breadcrumbs/_.php');
        }

        return base_path('routes/web/_.php');
    }
}
