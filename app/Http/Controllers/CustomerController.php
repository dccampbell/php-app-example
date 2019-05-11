<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    /** Show the customer list. */
    public function index(): View
    {
        $customers = Customer::all()->map(function (Customer $customer) {
            return [
                'id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'address' => "{$customer->street}\n{$customer->city}, {$customer->state} {$customer->zip}",
                'updated' => $customer->updated_at->timestamp,
                'updatedStr' => $customer->updated_at->diffForHumans(),
                'active' => $customer->active,
                'editUrl' => route('customer.edit', $customer->id),
            ];
        });
        return view('customer.index', ['customers' => $customers->values()]);
    }

    /** Show the form for creating a new customer. */
    public function create(): View
    {
        $customer = new Customer();
        return view('customer.create', ['customer' => $customer]);
    }

    /** Show the form for editing the specified resource. */
    public function edit(Customer $customer): View
    {
        return view('customer.edit', ['customer' => $customer]);
    }

    /** Get the specified customer as JSON. */
    public function show(Customer $customer): Response
    {
        return response()->json($customer);
    }

    /** Save a newly created customer in storage. */
    public function store(CustomerRequest $request): Response
    {
        $customer = new Customer();
        $saved = $customer->fill($request->input())->save();
        return $this->saveResponse($saved, 201, 'Customer created.', 'Error creating customer.');
    }

    /** Update the specified customer in storage. */
    public function update(CustomerRequest $request, Customer $customer): Response
    {
        $saved = $customer->fill($request->input())->save();
        return $this->saveResponse($saved, 204, 'Customer updated.', 'Error updating customer.');
    }

    /** Remove the specified customer from storage. */
    public function destroy(Customer $customer): Response
    {
        $saved = $customer->delete();
        return $this->saveResponse($saved, 204, 'Customer deleted.', 'Error deleting customer.');
    }

    /**
     * Redirect/response logic following a model create/update/destroy.
     * Checks for 'redirectTo' on request, and redirects with success message if it's set.
     * Otherwise, simply sets the status code and returns the response.
     *
     * @param bool $saved true for success, false for error
     * @param int $status HTTP response code to return if redirect isn't sent
     * @param string $successMsg
     * @param string $errorMsg
     * @return Response
     */
    protected function saveResponse(
        $saved,
        $status = 204,
        $successMsg = 'Customer Saved',
        $errorMsg = 'Error saving customer.'
    ): Response {
        if (!$saved) {
            return redirect()->back()->withErrors($errorMsg)->withInput();
        }
        if ($to = request('redirectTo')) {
            return redirect()->to($to)->with('success', $successMsg);
        }
        return response()->setStatusCode($status);
    }
}
