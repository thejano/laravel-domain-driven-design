<?php

use TheJano\LaravelDomainDrivenDesign\Helpers\DirectoryHelper;

it('returns true when the target does not exist', function () {
    expect(DirectoryHelper::deleteDirectory(sys_get_temp_dir().'/ddd-missing-'.uniqid()))->toBeTrue();
});

it('deletes a single file', function () {
    $file = sys_get_temp_dir().'/ddd-file-'.uniqid().'.txt';
    file_put_contents($file, 'contents');

    expect(DirectoryHelper::deleteDirectory($file))->toBeTrue()
        ->and(file_exists($file))->toBeFalse();
});

it('recursively deletes a directory and all of its contents', function () {
    $base = sys_get_temp_dir().'/ddd-dir-'.uniqid();
    mkdir($base.'/nested/deeper', 0755, true);
    file_put_contents($base.'/root.txt', 'a');
    file_put_contents($base.'/nested/child.txt', 'b');
    file_put_contents($base.'/nested/deeper/leaf.txt', 'c');

    expect(is_dir($base))->toBeTrue();

    expect(DirectoryHelper::deleteDirectory($base))->toBeTrue()
        ->and(is_dir($base))->toBeFalse();
});
