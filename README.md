# retribusi-pelayanan-kesehatan
retribusi-pelayanan-kesehatan

[![Join the chat at https://gitter.im/retribusi-pelayanan-kesehatan](https://badges.gitter.im/retribusi-pelayanan-kesehatan.svg)](https://gitter.im/retribusi-pelayanan-kesehatan?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/retribusi-pelayanan-kesehatan/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/retribusi-pelayanan-kesehatan/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/retribusi-pelayanan-kesehatan/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/retribusi-pelayanan-kesehatan/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/v/stable)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)
[![Total Downloads](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/downloads)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/v/unstable)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)
[![License](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/license)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/d/monthly)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)
[![Daily Downloads](https://poser.pugx.org/bantenprov/retribusi-pelayanan-kesehatan/d/daily)](https://packagist.org/packages/bantenprov/retribusi-pelayanan-kesehatan)

## Retribusi Pelayanan Kesehatan

Repository untuk membuat atau melakukan proses data retribusi pelayanan kesehatan


## Install package :

```bash

$ composer require bantenprov/retribusi-pelayanan-kesehatan:dev-master

```

## Edit config/app.php

### If you use laravel 5.4
#### providers

```php
'providers' => [
    ...
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    ...
    
    Bantenprov\PelayananKesehatan\PelayananKesehatanServiceProvider::class,
    Emadadly\LaravelUuid\LaravelUuidServiceProvider::class,
```

### aliases
```php
'aliases' => [
    ...
    'Storage' => Illuminate\Support\Facades\Storage::class,
    'URL' => Illuminate\Support\Facades\URL::class,
    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    ...
    'Opd' => Bantenprov\PelayananKesehatan\Facades\PelayananKesehatan::class,
```

## Artisan command :

```bash
$ php artisan vendor:publish --tag=migrations
$ php artisan vendor:publish --tag=views
$ php artisan vendor:publish --provider="Emadadly\LaravelUuid\LaravelUuidServiceProvider"
```

### Edit config/uuid.php
Change `'default_uuid_column' => 'uuid'` to `'default_uuid_column' => 'id'`
```php
'default_uuid_column' => 'id',
```

### Edit "vendor/kalnoy/nestedset/src/NestedSet.php"
Change `$table->unsignedInteger(self::PARENT_ID)->nullable();` to `$table->string(self::PARENT_ID)->nullable();`
```php
public static function columns(Blueprint $table)
{
    $table->unsignedInteger(self::LFT)->default(0);
    $table->unsignedInteger(self::RGT)->default(0);
    $table->string(self::PARENT_ID)->nullable();

    $table->index(static::getDefaultColumns());
}
```

## Run artisan command :

```bash
$ php artisan migrate
```
