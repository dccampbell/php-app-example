<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function user_can_create_customer(): void
    {
        // create a unique email to test with
        $email = 'test+' . time() . '@example.com';

        // generate a customer model with the email
        /** @var Customer $customer */
        $customer = factory(Customer::class)->make(['email' => $email]);

        // send a post request customer properties to the create endpoint
        $this->post('/customer', $customer->toArray());

        // confirm the customer was created in the database
        $this->assertDatabaseHas('customers', ['email' => $email]);

        // confirm the unique email is now visible on the list page
        $this->get('/customer')->assertSee($email);
    }
}
