<?php

namespace TheJano\LaravelDomainDrivenDesign\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use TheJano\LaravelDomainDrivenDesign\LaravelDomainDrivenDesignServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelDomainDrivenDesignServiceProvider::class,
        ];
    }
}
