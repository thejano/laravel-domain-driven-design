<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateMailCommand extends \Illuminate\Foundation\Console\MailMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:mail';

    protected $description = 'Generate a new mail for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Mail";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
