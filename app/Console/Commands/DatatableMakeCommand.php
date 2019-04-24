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
            ['name', InputArgument::REQUIRED, 'The name of the datatable class.'],
            ['model', InputArgument::REQUIRED, 'The model of the datatable.'],
            ['transformer', InputArgument::REQUIRED, 'The model transformer.'],
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
        $stub = $this->replaceTransformer($stub);

        return $this->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    protected function replaceTransformer($stub)
    {
        $tranformerFixed = str_replace('/', '\\', $this->argument('transformer'));
        $tranformerFull  = $this->rootNamespace()  . 'Transformers\\' . $tranformerFixed;
        $fqdn       = '\\' . $tranformerFull;

        if (! class_exists($fqdn)) {
            $this->info("Transformer does not exist. Creating {$tranformerFull}.");
            $this->call('make:transformer', [
                'name' => $this->argument('transformer'),
                'model' => $this->argument('model'),
            ]);
        }
    
        return str_replace(
            ['DummyTransformerFull'],
            [$tranformerFull],
            $stub
        );
    }

    protected function replaceModel($stub)
    {
        $modelFixed = str_replace('/', '\\', $this->argument('model'));
        $modelFull  = $this->rootNamespace() . $modelFixed;
        $fqdn       = '\\' . $modelFull;

        if (! class_exists($fqdn)) {
            throw new \Exception("Model $modelFull does not exist");
        }
    
        return str_replace(
            ['DummyModelFull'],
            [$modelFull],
            $stub
        );
    }
}
