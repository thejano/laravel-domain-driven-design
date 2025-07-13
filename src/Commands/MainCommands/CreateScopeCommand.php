<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateScopeCommand extends \Illuminate\Foundation\Console\ScopeMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:scope';

    protected $description = 'Generate a new Scope for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            $domain_path = DomainHelper::getPath($namespace.'/'.$this->option('domain'));

            $scopePath = is_dir(base_path($domain_path.'/Models')) ? 'Models\\Scopes' : 'Scopes';

            return "{$namespace}\\{$this->option('domain')}\\{$scopePath}";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }
}
