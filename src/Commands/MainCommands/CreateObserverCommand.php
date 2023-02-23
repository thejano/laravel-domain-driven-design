<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateObserverCommand extends \Illuminate\Foundation\Console\ObserverMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:observer';

    protected $description = 'Generate a new observer for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Observers";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
