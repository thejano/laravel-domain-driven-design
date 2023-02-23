# Main Laravel Commands
[[toc]]

## Model
You can create a Model using:
```shell
php artisan d:make:model Release -d Releases
```

## Cast
You can create a Cast using:
```shell
php artisan d:make:cast ReleaseDateCast -d Releases
```

## Observer
You can create an Observer using:
```shell
php artisan d:make:observer ReleaseObserver --model=Release -d Releases
```


## Scope
You can create a Scope using:
```shell
php artisan d:make:scope CountryScope -d Releases
```

## Exception
You can create an Exception using:
```shell
php artisan d:make:exception NoTitleException -d Releases
```

## Policy
You can create a Policy using:
```shell
php artisan d:make:policy CanAddBarcodePolicy --model=Release -d Releases
```


## Controller
You can create a Controller using:
```shell
php artisan d:make:controller ReleaseController -d Releases
```
Or with Model
```shell
php artisan d:make:controller ReleaseController -r --model=Release -d Releases
```

## Api Resource
You can create an Api Resource using:
```shell
php artisan d:make:resource ReleaseResource -d Releases
```


## Request
You can create a Request using:
```shell
php artisan d:make:request StoreReleaseRequest -d Releases
```


## Rule
You can create a Policy using:
```shell
php artisan d:make:rule CustomTitleRule -d Releases
```


## Middleware
You can create a Middleware using:
```shell
d:make:middleware ReleaseUpdateMiddleware -d Releases
```


## Event
You can create an Event using:
```shell
php artisan d:make:event StoreRelease -d Releases
```

## Listener
You can create a Listener using:
```shell
php artisan d:make:listener StoreReleaseNotification --event=StoreRelease -d Releases
```

## Channel
You can create a Channel using:
```shell
php artisan d:make:channel ReleaseChannel -d Releases
```

## Job
You can create a Job using:
```shell
php artisan d:make:job SetReleaseBarcodeJob -d Releases
```

## Mail
You can create a Mail using:
```shell
php artisan d:make:mail ReleaseAccpetedMail -m -d Releases
```

## Notification
You can create a Notification using:
```shell
php artisan d:make:notification ReleaseDistributedNotification -m -d Releases
```
