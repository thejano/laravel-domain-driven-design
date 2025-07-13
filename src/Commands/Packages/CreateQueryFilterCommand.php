<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\Packages;

use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCustomCommandsTrait;

class CreateQueryFilterCommand extends \Illuminate\Console\Command
{
    use PrepareCustomCommandsTrait;

    protected $signature = 'd:make:query-filter {name} {--d|domain=}  {--filterable=} ';

    protected $description = 'Generate a new query filter class';

    protected string $type = 'QueryFilter';

    protected function getDefaultNamespace(): string
    {
        $config =
            $this->removeRootNamespace(config('filterable.query_filter_namespace'))
            ?? 'Filters\\QueryFilter';

        return $this->getNamespace().$config;
    }

    public function handle(): void
    {
        $filterable = [];
        if ($this->option('filterable') !== null) {
            $filterable = ['--filterable' => $this->option('filterable')];
        }

        $this->call(
            'make:query-filter',
            array_merge(
                [
                    'name' => $this->argument('name'),
                    '--namespace' => $this->getDefaultNamespace(),
                ],
                $filterable
            )
        );
    }
}
