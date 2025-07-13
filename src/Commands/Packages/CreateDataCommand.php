<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\Packages;

use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCustomCommandsTrait;

class CreateDataCommand extends \Illuminate\Console\Command
{
    use PrepareCustomCommandsTrait;

    protected $signature = 'd:make:data {name} {--d|domain=} {--dir=Data} {--s|suffix=Data} {--f|force=}';

    protected $description = 'Generate a new Spatie Data';

    protected string $type = 'Data';

    protected function getDefaultNamespace(): string
    {
        return $this->getNamespace().$this->option('dir');
    }

    public function prepareArguments(): array
    {
        $args = ['name' => $this->argument('name')];
        if ($this->option('domain') !== null) {
            $args['--namespace'] = $this->removeRootNamespace($this->getDefaultNamespace());
        }

        if ($this->option('suffix') !== null) {
            $args['--suffix'] = $this->option('suffix');
        }

        if ($this->option('force') !== null) {
            $args['--force'] = $this->option('force');
        }

        return $args;
    }

    public function handle(): void
    {
        $this->call('make:data', $this->prepareArguments());
    }
}
