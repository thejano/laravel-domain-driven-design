<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use Illuminate\Support\Str;
use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateListenerCommand extends \Illuminate\Foundation\Console\ListenerMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:listener';

    protected $description = 'Generate a new listener for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if (null !== $this->option('domain')) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Listeners";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    protected function buildClass($name)
    {
        $event = $this->option('event');
        $domain = $this->option('domain');
        $namespace = null !== $domain ? DomainHelper::getFullNamespace($domain) : $this->laravel->getNamespace();

        if (! Str::startsWith(
            $event,
            [
                $this->laravel->getNamespace(),
                'Illuminate',
                '\\',
            ]
        )) {
            $event = $namespace.'Events\\'.str_replace('/', '\\', $event);
        }

        $stub = str_replace(
            ['DummyEvent', '{{ event }}'],
            class_basename($event),
            $this->parentbuildClass($name)
        );

        return str_replace(['DummyFullEvent', '{{ eventNamespace }}'], trim($event, '\\'), $stub);
    }

    protected function parentbuildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }
}
