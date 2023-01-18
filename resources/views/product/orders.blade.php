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
                    <h3 class="page-title">Order View</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order View</li>
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



        <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-userLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                {!! Form::open(['method' => 'post', 'url' => 'product_store', 'files' => true]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-userLabel">Add Products</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="task_id" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input class="form-control"id="product_name" name="product_name" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Product Price <span class="text-danger">*</span></label>
                                <input class="form-control" id="sell_price" name="sell_price" type="number">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input class="form-control" id="quantity" name="quantity" type="number">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Category<span class="text-danger">*</span></label>
                                <input class="form-control" id="category" name="category" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Photo<span class="text-danger">*</span></label>
                                <input class="form-control" placeholder="photos" name="photos" type="file">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea rows="2" id="description" name="description" class="col-md-12"></textarea>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>



        <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
        <script type="text/javascript">
            $('.modelClose').on('click', function() {
                $('#modal-user').hide();
            });
            var id;
            $('body').on('click', '#getEditProductData', function(e) {
                e.preventDefault();
                $('.alert-danger').html('');
                $('.alert-danger').hide();
                id = $(this).val();
                $.ajax({
                    url: "/get-product/" + id,
                    method: 'GET',

                    success: function(data) {

                        console.log(data);
                        $('#task_id').val(data.id);
                        $('#task_ids').val(data.id);
                        $('#product_name').val(data.product_name);
                        $('#description').val(data.description);
                        $('#sell_price').val(data.sell_price);
                        $('#quantity').val(data.quantity);
                        $('#category').val(data.category);
                        $('#modal-user').show();

                    }
                });
            });
        </script>

        <script type="text/javascript">
            $('body').on('click', '#getEditProductDatas', function(e) {
                e.preventDefault();
                $('.alert-danger').html('');
                $('.alert-danger').hide();
                id = $(this).val();
                $.ajax({
                    url: "/get-product/" + id,
                    method: 'GET',

                    success: function(data) {

                        console.log(data.id);
                        //$('#task_id').val(data.id);
                        $('#task_ids').val(data.id);



                    }
                });
            });
        </script>
    @endsection
