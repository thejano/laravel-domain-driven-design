<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateResourceCommand extends \Illuminate\Foundation\Console\ResourceMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:resource';

    protected $description = 'Generate a new resource for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Http\\Resources";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
