<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateEventCommand extends \Illuminate\Foundation\Console\EventMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:event';

    protected $description = 'Generate a new event for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Events";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
