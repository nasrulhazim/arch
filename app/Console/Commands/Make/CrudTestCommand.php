<?php

namespace App\Console\Commands\Make;

use Illuminate\Foundation\Console\TestMakeCommand;
use Illuminate\Support\Str;

class CrudTestCommand extends TestMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:test-crud {name : The name of the class} {model : The name of the targeted model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new CRUD test class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Test';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/../stubs/test-crud.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Feature';
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'Tests';
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $find = [
            'ROUTE_NAME', 'MODEL_NAME', 'TITLE',
        ];

        $model_basename = class_basename($this->argument('model'));
        $route_name     = Str::slug($model_basename, '.');
        $title          = ucfirst($route_name);
        $model          = str_replace('/', '\\', $this->argument('model'));

        $replace = [
            $route_name,
            $model,
            $title,
        ];

        $stub = str_replace($find, $replace, $stub);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }
}
