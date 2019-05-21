<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class TransformerMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:transformer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Transformer class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Transformer';

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Transformers';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/transformer.stub';
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

        return str_replace(
            ['DummyModelFull', 'DummyModelShort'],
            [$modelFull, $modelShort],
            $stub
        );
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the transformer class.'],
            ['model', InputArgument::REQUIRED, 'The model of the transformer.'],
        ];
    }
}
