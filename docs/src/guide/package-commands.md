# Package Commands
[[toc]]
## Laravel Data
You should install the package first:
```shell
composer require spatie/laravel-data
```
Then you can create a Data using
```shell
php artisan d:make:data ReleaseData -d Releases
```

If you want to change the Data directory name you can pass `--dir` option
```shell
php artisan d:make:data ReleaseData --dir=DataDTO -d Releases
```


## Laravel Filterable
You should install the package first:
```shell
composer require thejano/laravel-filterable
```
Then you can create a Filterable class using
```shell
php artisan d:make:filterable ReleaseFilterable -d Releases
```
```shell
php artisan d:make:query-filter BarcodeQueryFilter --filterable=ReleaseFilterable -d Releases
```
