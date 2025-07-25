<?php

namespace TheJano\LaravelDomainDrivenDesign\Traits;

use Illuminate\Support\Str;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

trait PrepareCustomCommandsTrait
{
    protected function rootNamespace()
    {
        return $this->laravel->getNamespace();
    }

    protected function getNamespace(): string
    {
        if ($this->option('domain') !== null) {
            return DomainHelper::getNamespace()."\\{$this->option('domain')}\\";
        }

        return $this->rootNamespace();
    }

    protected function getDefaultNamespace(): string
    {
        return $this->getNamespace();
    }

    protected function removeRootNamespace(?string $namespace): ?string
    {
        if ($namespace === null) {
            return null;
        }

        return (string) Str::of($namespace)->replace('App\\', '');
    }
}
