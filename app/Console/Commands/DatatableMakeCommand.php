<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\InputArgument;

class DatatableMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:dt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Datatable class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Datatable';

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Datatables';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/datatable.stub';
    }

    protected function getArguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'The base model of the datatable.'],
            ['name', InputArgument::REQUIRED, 'The name of the datatable class.'],
        ];
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceModel($stub);

        return $this->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    protected function replaceModel($stub)
    {
        $modelFixed = str_replace('/', '\\', $this->argument('model'));
        $modelFull  = $this->rootNamespace() . $modelFixed;
        $fqdn       = '\\' . $modelFull;
        $modelShort = (new \ReflectionClass($fqdn))->getShortName();

        if (! class_exists($fqdn)) {
            throw new \Exception("Model $modelFull does not exist");
        }

        $tableName       = (new $fqdn())->getTable();
        $columns         = Schema::getColumnListing($tableName);
        $fullColumnNames = array_map(function ($name) use ($tableName) {
            return  "            '" . $tableName . '.' . $name . "',";
        }, $columns);
        $fullColumnNames[] = '        ]';
        $fixedColumns      = "[\n" . implode("\n", $fullColumnNames);

        $maps = array_map(function ($name) use ($tableName) {
            return '            $row->' . $name . ',';
        }, $columns);

        $maps[] = '            // Uncomment below to add an actions column:';
        $maps[] = "            // view('some.view.path', compact('row'))->__toString(),";
        $maps[] = '        ]';

        $tableMaps = "[\n" . implode("\n", $maps);

        return str_replace(
            ['DummyModelFull', 'DummyModelShort', 'DummyTableName', 'DummyMap', 'DummyColumns'],
            [$modelFull, $modelShort, $tableName, $tableMaps, $fixedColumns],
            $stub
        );
    }
}
