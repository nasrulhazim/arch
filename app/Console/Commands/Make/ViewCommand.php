<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class ViewCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view';

    /**
     * Create a new controller creator command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name     = Str::kebab(str_replace(['/', '\\'], '', $this->argument('name')));
        $basename = class_basename($name);

        $view_path = resource_path('views/' . $name);

        if (! file_exists($view_path)) {
            mkdir($view_path);
            mkdir($view_path . '/partials');
        }

        $find = [
            'TITLE', 'DATATABLE_ID', 'DATATABLE_ROUTE_NAME', 'ROUTE_NAME',
        ];
        $replace = [
            Str::title($name),
            Str::snake($name),
            $this->getDatatableRouteName(),
            Str::slug($basename, '.'),
        ];
        $stubs = $this->getStubs();

        foreach ($stubs as $file => $stub) {
            file_put_contents(
                $view_path . '/' . $file . '.blade.php',
                str_replace($find, $replace, $stub)
            );
        }

        $this->info($this->argument('name') . ' views successfully added.');
    }

    private function getStubs()
    {
        return [
            'index'            => file_get_contents(app_path('Console/Commands/stubs/views/index.stub')),
            'show'             => file_get_contents(app_path('Console/Commands/stubs/views/show.stub')),
            'create'           => file_get_contents(app_path('Console/Commands/stubs/views/create.stub')),
            'edit'             => file_get_contents(app_path('Console/Commands/stubs/views/edit.stub')),
            'partials/actions' => file_get_contents(app_path('Console/Commands/stubs/views/partials/actions.stub')),
        ];
    }

    private function getDatatableRouteName()
    {
        $dummyClass     = class_basename(str_replace('/', '\\', $this->argument('name')));
        $dummyUri       = strtolower(Str::plural(str_replace('Datatable', '', $dummyClass)));
        $dummyRouteName = Str::kebab($dummyUri);

        return $dummyRouteName;
    }
}
