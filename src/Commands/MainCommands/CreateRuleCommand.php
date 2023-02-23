<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateRuleCommand extends \Illuminate\Foundation\Console\RuleMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:rule';

    protected $description = 'Generate a new rule for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Rules";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
