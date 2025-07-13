<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateChannelCommand extends \Illuminate\Foundation\Console\ChannelMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:channel';

    protected $description = 'Generate a new broadcasting channel for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Broadcasting";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
