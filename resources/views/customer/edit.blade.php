@extends('layout')
@section('title', '- Edit Customer')
@section('content')

    <div class="row">
        <div class="col pl-0">
            <h2>Edit Customer</h2>
        </div>
    </div>

    <div class="row mt-3">

        {!! Form::model($customer, ['route'=>['customer.update', $customer->id], 'method'=>'put', 'class'=>'col']) !!}
        {!! Form::hidden('redirectTo', route('customer.index')) !!}

        <div class="col">
            @include('customer.fields')
            <hr>
            <fieldset class="text-right">
                {!! Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                {!! link_to_route('customer.index', 'Cancel', null, ['class'=>'btn btn-outline-secondary ml-2']) !!}
                <p class="mt-2 font-italic small text-muted">*All fields are required</p>
            </fieldset>
        </div>
        {!! Form::close() !!}

    </div>

@endsection