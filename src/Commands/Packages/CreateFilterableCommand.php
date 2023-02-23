<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\Packages;

use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCustomCommandsTrait;

class CreateFilterableCommand extends \Illuminate\Console\Command
{
    use PrepareCustomCommandsTrait;

    protected $signature = 'd:make:filterable {name} {--d|domain=} ';

    protected $description = 'Generate a new filterable class';

    protected string $type = 'Filterable';

    protected function getDefaultNamespace(): string
    {
        $config =
            $this->removeRootNamespace(config('filterable.filterable_namespace'))
            ?? 'Filters\\Filterable';

        return $this->getNamespace().$config;
    }

    public function handle(): void
    {
        $this->call('make:filterable', [
            'name' => $this->argument('name'),
            '--namespace' => $this->getDefaultNamespace(),
        ]);
    }
}
