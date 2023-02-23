<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateNotificationCommand extends \Illuminate\Foundation\Console\NotificationMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:notification';

    protected $description = 'Generate a new notification for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Notifications";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
