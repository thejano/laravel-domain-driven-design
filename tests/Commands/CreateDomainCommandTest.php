<?php

use TheJano\LaravelDomainDrivenDesign\Helpers\DirectoryHelper;

beforeEach(function () {
    // The command writes folders relative to the current working directory,
    // so run each test inside a throwaway directory we can clean up.
    $this->workdir = sys_get_temp_dir().'/ddd-cmd-'.uniqid();
    mkdir($this->workdir, 0755, true);
    $this->previousCwd = getcwd();
    chdir($this->workdir);
});

afterEach(function () {
    chdir($this->previousCwd);
    DirectoryHelper::deleteDirectory($this->workdir);
});

it('scaffolds a new domain with every configured folder', function () {
    $this->artisan('d:create', ['name' => 'Blog'])->assertSuccessful();

    foreach (config('domain-driven-design.scaffold_folders') as $folder) {
        expect(is_dir($this->workdir.'/app/Domain/Blog'.$folder))->toBeTrue();
    }
});

it('scaffolds the domain under a custom namespace', function () {
    $this->artisan('d:create', ['name' => 'Billing', '--namespace' => 'App\\Modules'])
        ->assertSuccessful();

    expect(is_dir($this->workdir.'/app/Modules/Billing/Models'))->toBeTrue()
        ->and(is_dir($this->workdir.'/app/Domain/Billing'))->toBeFalse();
});
