<?php

namespace TheJano\LaravelDomainDrivenDesign\Commands\MainCommands;

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;
use TheJano\LaravelDomainDrivenDesign\Traits\PrepareCommandTrait;

class CreateControllerCommand extends \Illuminate\Routing\Console\ControllerMakeCommand
{
    use PrepareCommandTrait;

    protected $name = 'd:make:controller';

    protected $description = 'Generate a new controller for provided domain';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->option('domain') !== null) {
            $namespace = DomainHelper::getNamespace();

            return "{$namespace}\\{$this->option('domain')}\\Http\\Controllers";
        }

        return parent::getDefaultNamespace($rootNamespace);
    }

    protected function buildFormRequestReplacements(array $replace, $modelClass)
    {
        [$namespace, $storeRequestClass, $updateRequestClass] = [
            'Illuminate\\Http', 'Request', 'Request',
        ];

        $domainNamespace = DomainHelper::getNamespace()."\\{$this->option('domain')}";

        if ($this->option('requests')) {
            $namespace = "{$domainNamespace}\\Http\\Requests";

            [$storeRequestClass, $updateRequestClass] = $this->generateFormRequests(
                $modelClass,
                $storeRequestClass,
                $updateRequestClass
            );
        }

        $namespacedRequests = $namespace.'\\'.$storeRequestClass.';';
        if ($storeRequestClass !== $updateRequestClass) {
            $namespacedRequests .= PHP_EOL.'use '.$namespace.'\\'.$updateRequestClass.';';
        }

        return array_merge($replace, [
            '{{ storeRequest }}' => $storeRequestClass,
            '{{storeRequest}}' => $storeRequestClass,
            '{{ updateRequest }}' => $updateRequestClass,
            '{{updateRequest}}' => $updateRequestClass,
            '{{ namespacedStoreRequest }}' => $namespace.'\\'.$storeRequestClass,
            '{{namespacedStoreRequest}}' => $namespace.'\\'.$storeRequestClass,
            '{{ namespacedUpdateRequest }}' => $namespace.'\\'.$updateRequestClass,
            '{{namespacedUpdateRequest}}' => $namespace.'\\'.$updateRequestClass,
            '{{ namespacedRequests }}' => $namespacedRequests,
            '{{namespacedRequests}}' => $namespacedRequests,
        ]);
    }

    /**
     * Generate the form requests for the given model and classes.
     *
     * @param  string  $modelClass
     * @param  string  $storeRequestClass
     * @param  string  $updateRequestClass
     * @return array
     */
    protected function generateFormRequests($modelClass, $storeRequestClass, $updateRequestClass)
    {
        $storeRequestClass = 'Store'.class_basename($modelClass).'Request';

        $this->call('d:make:request', [
            'name' => $storeRequestClass,
            '--domain' => $this->option('domain'),
        ]);

        $updateRequestClass = 'Update'.class_basename($modelClass).'Request';

        $this->call('d:make:request', [
            'name' => $updateRequestClass,
            '--domain' => $this->option('domain'),
        ]);

        return [$storeRequestClass, $updateRequestClass];
    }
}
