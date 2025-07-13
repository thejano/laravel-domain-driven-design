<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateRequestCommand extends \Illuminate\Foundation\Console\RequestMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:request';

    protected $description = 'Generate a new request for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Http\\Requests";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
