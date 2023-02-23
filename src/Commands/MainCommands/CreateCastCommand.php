<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateCastCommand extends \Illuminate\Foundation\Console\CastMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:cast';

    protected $description = 'Generate a new cast for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Casts";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
