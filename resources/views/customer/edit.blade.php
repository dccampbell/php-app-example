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
            <div class="row mt-4">
                <fieldset class="col">
                    {!! Form::button('Save', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                    {!! link_to_route('customer.index', 'Cancel', null, ['class'=>'btn btn-outline-secondary ml-2']) !!}
                    <p class="mt-2 font-italic small text-muted">*All fields are required</p>
                </fieldset>
                <fieldset class="col text-right">
                    <button type="button" class="btn btn-outline-danger" @click="confirmDelete">Delete Customer</button>
                </fieldset>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <div v-cloak>
        <b-alert class="mt-3 text-center" variant="danger" v-model="showDeleteConfirm" dismissible>
            {!! Form::model($customer, [ 'route' => ['customer.destroy', $customer->id], 'method' => 'delete' ]) !!}
            {!! Form::hidden('redirectTo', route('customer.index')) !!}

            Are you sure you want to delete this customer?
            {!! Form::button('Yes', ['type'=>'submit', 'class'=>'btn btn-danger ml-2 px-2 py-0']) !!}

            {!! Form::close() !!}
        </b-alert>
    </div>

@endsection
@section('scripts')

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                showDeleteConfirm: false
            },
            methods: {
                confirmDelete: function () {
                    this.showDeleteConfirm = true;
                }
            }
        });
    </script>

@endsection