<?php

namespace TheJano\LaravelDomainDrivenDesign;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thejano\LaravelDomainDrivenDesign\Skeleton\SkeletonClass
 */
class LaravelDomainDrivenDesignFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-domain-driven-design';
    }
}
