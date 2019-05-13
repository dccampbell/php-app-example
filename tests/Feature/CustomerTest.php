<?php

namespace Tests\Feature;

use App\Customer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CustomerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function canCreateCustomer(): void
    {
        // create a unique email to test with
        $email = 'test+' . time() . '@example.com';

        // generate a customer model with the email
        /** @var Customer $customer */
        $customer = factory(Customer::class)->make(['email' => $email]);

        // send a request with the customer properties to the create endpoint
        $this->post('/customer', $customer->toArray());

        // confirm the customer was created in the database
        $this->assertDatabaseHas('customers', ['email' => $email]);

        // confirm the unique email is now visible on the list page
        $this->get('/customer')->assertSee($email);
    }

    /** @test */
    public function canUpdateCustomer(): void
    {
        // create a unique email to test with
        $email = 'test+' . time() . '@example.com';

        // generate and store a customer with the email
        /** @var Customer $customer */
        $customer = factory(Customer::class)->create(['email' => $email]);

        // confirm the customer was created in the database
        $this->assertDatabaseHas('customers', ['email' => $email]);

        // create a new name for the user
        $customer->name = 'Test Name';

        // send a request with the updated name to the customer update endpoint
        $this->put('/customer/' . $customer->id, $customer->toArray());

        // confirm the customer name was updated in the database
        $this->assertDatabaseHas('customers', ['email' => $email, 'name' => $customer->name]);
    }

    /** @test */
    public function canDeleteCustomer(): void
    {
        // create a unique email to test with
        $email = 'test+' . time() . '@example.com';

        // generate and store a customer with the email
        /** @var Customer $customer */
        $customer = factory(Customer::class)->create(['email' => $email]);

        // confirm the customer was created in the database
        $this->assertDatabaseHas('customers', ['email' => $email]);

        // send a request to the customer delete endpoint
        $this->delete('/customer/' . $customer->id);

        // confirm the customer was deleted from the database
        $this->assertDatabaseMissing('customers', ['email' => $email]);

        // confirm the unique email is not visible on the list page
        $this->get('/customer')->assertDontSee($email);
    }
}
