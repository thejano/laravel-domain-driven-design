<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\Extra;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

class CreateActionCommand extends GeneratorCommand
{
    protected $name = 'd:make:action';

    protected $description = 'Generate a new action class';

    protected $type = 'Action';

    protected function getStub()
    {
        return __DIR__.'/../../../stubs/action.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Actions";
        }

        return $rootNamespace.'\\Actions';
    }

    protected function qualifyClass($name): string
    {
        $suffix = trim($this->option('suffix') ?? 'Action');
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
                'Action',
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
