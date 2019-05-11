@extends('layout')
@section('title', '- Manage Customers')
@section('content')

    <div class="row">
        <div class="col pl-0">
            <h2>Customers</h2>
        </div>
        <div class="col pr-0 text-right">
            <a class="btn btn-outline-primary" href="{{ route('customer.create') }}">+ New Customer</a>
        </div>
    </div>

    <div class="table-responsive-lg mt-3 hscroll-shadow">
        <table id="customers-table" class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Last Updated</th>
                <th class="text-center">Active?</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if (count($customers))
                @foreach ($customers as $customer)
                    <?php /** @var \App\Customer $customer */ ?>
                    <tr>
                        <td class="name">{{ $customer->name }}</td>
                        <td class="email">{{ $customer->email }}</td>
                        <td class="address">
                            {{ $customer->street }}<br>
                            {{ $customer->city }}, {{ $customer->state }} {{ $customer->zip }}
                        </td>
                        <td class="updated">{{ $customer->updated_at->diffForHumans() }}</td>
                        <td class="active text-center">
                            {!! $customer->active ? '&check;' : '&cross;' !!}
                        </td>
                        <td class="actions text-center">
                            {!! link_to_route('customer.edit', 'Edit', [$customer->id],
                                              ['class'=>'btn btn-outline-secondary']) !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="100%">No customers matching your criteria.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

@endsection
