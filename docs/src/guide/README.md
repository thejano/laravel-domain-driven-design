# Introduction

[Domain-Driven Design](https://en.wikipedia.org/wiki/Domain-driven_design) (DDD) is a software development approach that emphasizes understanding and modeling the business domain. The goal is to create software that aligns with the needs of the business and is easier to maintain. DDD uses concepts such as bounded contexts, entity modeling, and ubiquitous language to create robust and maintainable software architecture.

This package helps you to create domains within your Laravel application. It provides a set of artisan command to generate Models, Controllers, Actions, Services and more.

<br>
Let's create an Album domain, you need to run

```shell
php artisan d:create Album
```

It would create a domain inside `app` folder under `Domain/Album` folder.
Also, it would generate the following scaffold:

```shell
|____app
| |____ Domain
| | |____ Album
| | | |____ Models
| | | |____ Exceptions
| | | |____ Policies
| | | |____ Http
| | | | |____ Middleware
| | | | |____ Resources
| | | | |____ Requests
| | | | |____ Controllers
| | | |____ Actions
| | | |____ Jobs
| | | |____ Events
| | | |____ Data
| | | |____ Observers
| | | |____ Listeners
| | | |____ Services
```


