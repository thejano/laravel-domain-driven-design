# Usage
[[toc]]
## Domain
You can create a new domain using this command:
```shell
php artisan d:create Releases
```

You can provide a custom namespace using
```shell
php artisan d:create Releases --namespace=App\\MyDomain
```


## Main Laravel Commands
The package provides a wrapper around most of the default laravel make commands, which are
```shell
make:model
make:cast
make:observer
make:scope
make:exception
make:policy
make:controller
make:resource
make:request
make:rule
make:middleware
make:event
make:listener
make:channel
make:job
make:mail
make:notification
```

## Package Commands
The package provides a wrapper around some popular third party commands, which are
```shell
make:data  // spatie/laravel-data
make:filterable // thejano/laravel-filterable
make:query-filter
```

## Custom Commands
The package provides some command to generate PHP classes out of the box, which are
```shell
make:action
make:service
```

<br>

All the domain make commands start with `d:` and should have `-d` or `--domain` option.
You can pass all default options with the command that you run.
In case if you don't provide `-d` or `--domain` option, the command works as itself.
