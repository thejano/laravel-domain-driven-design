<?php

use TheJano\LaravelDomainDrivenDesign\Helpers\DomainHelper;

it('returns the configured namespace by default', function () {
    expect(DomainHelper::getNamespace())->toBe('App\\Domain');
});

it('uses the provided namespace when one is given', function () {
    expect(DomainHelper::getNamespace('Custom\\Domain'))->toBe('Custom\\Domain');
});

it('builds a full namespace for a domain', function () {
    expect(DomainHelper::getFullNamespace('Blog'))->toBe('App\\Domain\\Blog\\');
});

it('builds a full namespace for a domain within a custom namespace', function () {
    expect(DomainHelper::getFullNamespace('Blog', 'Custom\\Domain'))->toBe('Custom\\Domain\\Blog\\');
});

it('converts the default namespace into a path, lowercasing the app segment', function () {
    expect(DomainHelper::getPath())->toBe('app/Domain');
});

it('converts a custom namespace into a path', function () {
    expect(DomainHelper::getPath('App\\Custom'))->toBe('app/Custom');
});

it('only lowercases the app segment, leaving other segments untouched', function () {
    expect(DomainHelper::getPath('Modules\\App'))->toBe('Modules/app');
});
