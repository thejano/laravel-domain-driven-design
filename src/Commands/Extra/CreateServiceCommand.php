<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\Extra;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

class CreateServiceCommand extends GeneratorCommand
{
    protected $name = 'd:make:service';

    protected $description = 'Generate a new service class';

    protected $type = 'Service';

    protected function getStub()
    {
        return __DIR__.'/../../../stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Services";
        }

        return $rootNamespace.'\\Services';
    }

    protected function qualifyClass($name): string
    {
        $suffix = trim($this->option('suffix') ?? 'Service');
        if (! empty($suffix) && ! Str::endsWith($name, $suffix)) {
            $name .= $suffix;
        }

        return parent::qualifyClass($name);
    }

    protected function getOptions(): array
    {
        return [
            [
                'domain',
                'd',
                InputOption::VALUE_REQUIRED,
                'Add it the domain',
            ],
            [
                'suffix',
                's',
                InputOption::VALUE_REQUIRED,
                'Suffix the class with this value.',
                'Service',
            ],
            [
                'force',
                'f',
                InputOption::VALUE_NONE,
                'Create the Data class even if the file already exists.',
            ],
        ];
    }
}
