<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use RuntimeException;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // A stale bootstrap/cache/config.php makes Laravel ignore the sqlite
        // overrides in phpunit.xml, so RefreshDatabase would wipe the real
        // database. Refuse to run rather than let that happen.
        if (config('database.default') !== 'sqlite'
            || config('database.connections.sqlite.database') !== ':memory:') {
            throw new RuntimeException(
                'Tests are not using the in-memory sqlite database — a cached config is '
                .'probably overriding phpunit.xml. Run "php artisan config:clear" first.'
            );
        }
    }
}
