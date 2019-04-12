<?php

namespace App\Traits\Seeds;

trait SeedDatum
{
    public function run()
    {
        foreach ($this->getSeedData() as $datum) {
            $this->getSeedModel()::create($datum);
        }
    }

    abstract public function getSeedData(): array;

    abstract public function getSeedModel(): string;
}
