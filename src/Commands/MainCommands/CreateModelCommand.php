<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use Illuminate\Support\Str;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateModelCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:model';

    protected $description = 'Generate a new Model for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Models";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    protected function createController()
    {
        $controller = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('d:make:controller', array_filter([
            'name' => "{$controller}Controller",
            '--model' => $this->option('resource') || $this->option('api') ? $modelName : null,
            '--api' => $this->option('api'),
            '--requests' => $this->option('requests') || $this->option('all'),
            '--domain' => $this->option('domain'),
        ]));
    }

    protected function createPolicy()
    {
        $policy = Str::studly(class_basename($this->argument('name')));

        $this->call('d:make:policy', [
            'name' => "{$policy}Policy",
            '--model' => $this->qualifyClass($this->getNameInput()),
            '--domain' => $this->option('domain'),
        ]);
    }
}
