<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateJobCommand extends \Illuminate\Foundation\Console\JobMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:job';

    protected $description = 'Generate a new job for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Jobs";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
