<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

class CreateDomainCommand extends Command
{
    protected $signature = 'd:create {name} {--ns|namespace=}';

    protected $description = 'Scaffold a new domain';

    protected $type = 'Domain';

    public function handle(): void
    {
        foreach ($this->domainScaffold() as $folder) {
            $this->makeDirectory($folder);
        }

        $namespace = DomainHelper::getNamespace($this->option('namespace'))."\\{$this->argument('name')}";

        $this->components->info("{$this->type} [{$namespace}] domain created!");
    }

    public function domainScaffold(): array
    {
        $domainPath = DomainHelper::getPath($this->option('namespace')).'/'.$this->argument('name');

        return collect(config('domain-driven-design.scaffold_folders'))
            ->map(
                fn ($folder) => $domainPath.$folder
            )
            ->toArray();
    }

    public function makeDirectory(string $path, int $mode = 0755, bool $recursive = true, bool $force = true): void
    {
        File::makeDirectory($path, $mode, $recursive, $force);
    }
}
