<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateExceptionCommand extends \Illuminate\Foundation\Console\ExceptionMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:exception';

    protected $description = 'Generate a new exceptions for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Exceptions";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
