<?php

namespace TheJano\LaravelDomainDrivenDesign;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;
use TheJano\LaravelDomainDrivenDesign\Commands\CreateDomainCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\Extra\CreateActionCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\Extra\CreateServiceCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateCastCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateChannelCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateControllerCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateEventCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateExceptionCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateJobCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateListenerCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateMailCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateMiddlewareCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateModelCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateNotificationCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateObserverCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreatePolicyCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateRequestCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateResourceCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateRuleCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\MainCommands\CreateScopeCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\Packages\CreateDataCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\Packages\CreateFilterableCommand;
use TheJano\LaravelDomainDrivenDesign\Commands\Packages\CreateQueryFilterCommand;

class LaravelDomainDrivenDesignServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/domain-driven-design.php' => config_path('domain-driven-design.php'),
            ], 'laravel-domain-driven-design');

            // Registering package commands.
            $this->commands($this->registeredCommands());
        }

        // Pick proper Factory class name
        Factory::guessFactoryNamesUsing(static function (string $modelName) {
            return 'Database\\Factories\\'.class_basename($modelName).'Factory';
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/domain-driven-design.php',
            'domain-driven-design'
        );

        //        // Register the main class to use with the facade
        //        $this->app->singleton('laravel-domain-driven-design', function () {
        //            return new LaravelDomainDrivenDesign();
        //        });
    }

    public function registeredCommands(): array
    {
        return [
            CreateDomainCommand::class,
            CreateModelCommand::class,
            CreateObserverCommand::class,
            CreateScopeCommand::class,
            CreateEventCommand::class,
            CreateListenerCommand::class,
            CreateJobCommand::class,
            CreateExceptionCommand::class,
            CreateResourceCommand::class,
            CreateRequestCommand::class,
            CreateMailCommand::class,
            CreateNotificationCommand::class,
            CreatePolicyCommand::class,
            CreateRuleCommand::class,
            CreateControllerCommand::class,
            CreateMiddlewareCommand::class,
            CreateChannelCommand::class,
            CreateCastCommand::class,
            CreateDataCommand::class,
            CreateFilterableCommand::class,
            CreateQueryFilterCommand::class,
            CreateActionCommand::class,
            CreateServiceCommand::class,
        ];
    }
}
