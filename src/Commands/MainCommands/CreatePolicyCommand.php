<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use Illuminate\Support\Str;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreatePolicyCommand extends \Illuminate\Foundation\Console\PolicyMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:policy';

    protected $description = 'Generate a new policy for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Policies";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    protected function qualifyModel(string $model)
    {
        $domain = $this->option('domain');

        $rootNamespace = null !== $domain ? DomainHelper::getFullNamespace($domain).'Models\\' : $this->rootNamespace();

        $model = ltrim($model, '\\/');

        $model = str_replace('/', '\\', $model);

        if (Str::startsWith($model, $rootNamespace)) {
            return $model;
        }

        return is_dir(app_path('Models'))
            ? $rootNamespace.'Models\\'.$model
            : $rootNamespace.$model;
    }
}
