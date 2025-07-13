<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateMiddlewareCommand extends \Illuminate\Routing\Console\MiddlewareMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:middleware';

    protected $description = 'Generate a new middleware for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Http\\Middleware";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
