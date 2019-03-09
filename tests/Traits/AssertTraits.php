<?php

namespace Tests\Traits;

trait AssertTraits
{
    public function assertHelperExist($helper)
    {
        $this->assertTrue(function_exists($helper));
    }

    public function assertClassExist($class)
    {
        $this->assertTrue(class_exists($class));
    }

    public function assertConfigFileExist($file)
    {
        $this->assertFileExists(config_path($file . '.php'));
    }

    public function assertConfigKeyExist($key)
    {
        $this->assertNotNull(config($key));
    }
}
