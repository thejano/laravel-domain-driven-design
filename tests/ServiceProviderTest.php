<?php

use Illuminate\Support\Facades\Artisan;

it('merges the package configuration', function () {
    expect(config('domain-driven-design.namespace'))->toBe('App\\Domain')
        ->and(config('domain-driven-design.scaffold_folders'))->toBeArray()->not->toBeEmpty();
});

it('registers the create domain command', function () {
    expect(Artisan::all())->toHaveKey('d:create');
});

it('registers every package command', function () {
    $commands = array_keys(Artisan::all());

    expect($commands)->toContain(
        'd:create',
        'd:make:model',
        'd:make:controller',
        'd:make:action',
        'd:make:service',
    );
});
