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
        <b-table id="customers-table" striped :fields="this.fields" :items="this.items"
                 sort-by="updated" sort-desc="false" :per-page="perPage" :current-page="currentPage">

            <template slot="updated" slot-scope="data">
                @{{ data.item.updatedStr }}
            </template>
            <template slot="active" slot-scope="data">
                @{{ data.item.active ? '&check;' : '&cross;' }}
            </template>
            <template slot="actions" slot-scope="data">
                <a :href="data.item.editUrl" class="btn btn-outline-secondary">Edit</a>
            </template>

        </b-table>
    </div>

    <div class="row">
        <div class="col pr-0">
            <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage" align="right"></b-pagination>
        </div>
    </div>

@endsection
@section('scripts')

    <script>
        window.customers = {!! $customers !!};

        const app = new Vue({
            el: '#app',
            data: {
                perPage: 15,
                currentPage: 1,
                fields: [
                    {key: 'name', sortable: true, class: 'name'},
                    {key: 'email', sortable: true, class: 'email'},
                    {key: 'address', sortable: false, class: 'address'},
                    {key: 'updated', sortable: true, class: 'updated'},
                    {key: 'active', sortable: true, class: 'active', label: 'Active?'},
                    {key: 'actions', sortable: false, class: 'actions'}
                ],
                items: window.customers
            },
            computed: {
                rows() {
                    return this.items.length
                }
            }
        });
    </script>

@endsection
