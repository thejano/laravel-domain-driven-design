<?php

namespace TheJano\LaravelDomainDrivenDesign\Helpers;

use Illuminate\Support\Str;

class DomainHelper
{
    public string $domainNamespace;

    public string $domainPath;

    public function __construct(?string $namespace = null)
    {
        $this->domainNamespace = $namespace ?? config('domain-driven-design.namespace');
        $this->setDomain();
    }

    public static function instance($namespace = null): self
    {
        return new self($namespace);
    }

    public static function getNamespace($namespace = null): string
    {
        return static::instance($namespace)->domainNamespace;
    }

    public static function getFullNamespace($domain, $namespace = null): string
    {
        return static::getNamespace($namespace)."\\{$domain}\\";
    }

    public static function getPath($namespace = null): string
    {
        return static::instance($namespace)->domainPath;
    }

    private function setDomain(): void
    {
        $this->domainPath =
            Str::of($this->domainNamespace)
                ->replace('\\', '/')
                ->explode('/')
                ->map(
                    fn ($name) => 'App' === $name ? strtolower($name) : $name
                )
                ->join('/');
    }
}
