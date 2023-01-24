@extends('layouts.template')
@section('extracss')
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection
@section('extrajs')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('myfiles/css/buttons.dataTables.min.css') }}">
    <script src="{{ asset('myfiles/js/dataTables.buttons.min.js') }}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Reports View</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active"> View</li>
                    </ul>
                </div>

                <!-- <a href="#" class="btn btn-success btn-add-emp" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add A Product</a> -->

            </div>
        </div>
        <div class="table-responsive small">
            {{ $dataTable->table(['class' => 'table table-bordered table-striped table-sm small']) }}
            @push('scripts')
                {{ $dataTable->scripts() }}
            @endpush
        </div>
    </div>
@endsection