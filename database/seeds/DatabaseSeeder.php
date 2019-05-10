<?php

use App\Customer;
use Illuminate\Database\Seeder;

/** @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace */
class DatabaseSeeder extends Seeder
{
    /** Seed the application's database. */
    public function run(): void
    {
        factory(Customer::class, 50)->create();
    }
}
