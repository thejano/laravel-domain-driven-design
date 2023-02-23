<?php

namespace TheJano\LaravelDomainDrivenDesign\Traits;

use Symfony\Component\Console\Input\InputOption;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

trait PrepareCommandTrait
{
    protected function getOptions(): array
    {
        return array_merge(
            [
                ['domain', 'd', InputOption::VALUE_OPTIONAL, 'Provide domain name.'],
            ],
            parent::getOptions()
        );
    }

    protected function getPath($name): string
    {
        $name = DomainHelper::getPath($name);

        return $this->laravel->basePath().'/'.$name.'.php';
    }

    protected function parseModel($model): string
    {
        if (preg_match('([^A-Za-z0-9_/\\\\])', $model)) {
            throw new \InvalidArgumentException('Model name contains invalid characters.');
        }

        $domain = $this->option('domain');

        return null !== $domain
        && ($this->qualifyModel($model) === "App\\Models\\{$model}" || $this->qualifyModel($model) === "App\\{$model}") ?
            DomainHelper::getNamespace()."\\{$domain}\\Models\\{$model}" :
            $this->qualifyModel($model);
    }
}
