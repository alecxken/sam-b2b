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
                    <h3 class="page-title">Products Cart</h3>
                   
                </div>
                <div class="btn-group">
                 <a href="#" class="btn btn-info btn-add-emp" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Purchase A Product</a>
                    <span><i></i></span>
                 <button class="btn btn-success btn-add-emp" id="getEditProductData" value="{{csrf_token()}}" data-toggle="modal" data-target="#PayModal">
                    <i class="fa fa-money"></i> Make Payment</button>
                </div>
               
            </div>
        </div>
        <div class="row">
<div class="col-md-6">
<div class="stats-info">
<h6>Total Products </h6>
<h4>@isset($isset){{$orders ?? 0}}@endisset</h4>
</div>
</div>
<div class="col-md-6">
<div class="stats-info">
<h6>Total Amount</h6>
<h4>@isset($isset){{$orders ?? 0}}@endisset</h4>
</div>
</div>

</div>
        <div class="table-responsive small">
            {{ $dataTable->table(['class' => 'table table-bordered table-striped table-sm small']) }}
            @push('scripts')
                {{ $dataTable->scripts() }}
            @endpush
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modal-userLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                {!! Form::open(['method' => 'post', 'url' => 'add-to-cart', 'files' => true]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-userLabel">Add Products</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="task_id" name="user_id" value="{{Auth::user()->email}}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <select class="form-control   select2  " name="product_id" >
                                    <option value="">Select Product</option>
                                        @isset($products)
                                        @foreach($products as $prod)
                                        <option value="{{$prod->id}}">{{$prod->product_name}}</option>
                                        @endforeach
                                        @endisset
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input class="form-control" id="quantity" name="qty" type="number">
                            </div>

                           


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Order</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

                <div class="modal fade" id="PayModal" tabindex="-1" role="dialog" aria-labelledby="modal-userLabels"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                {!! Form::open(['method' => 'post', 'url' => 'capture-payment', 'files' => true]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-userLabels">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" name="_toke" id="token" value="{{csrf_token()}}">
                    <input type="hidden" id="task_id" name="user_id" value="{{Auth::user()->email}}">
                    <div class="modal-body">
                      

                            <div class="form-group col-md-12">
                                <label>Amount Owed <span class="text-danger">*</span></label>
                                <input class="form-control" id="total_cost" name="total_cost" readonly  type="number">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Payment Mode <span class="text-danger">*</span></label>
                               <select class="form-control" name="mode">
                                <option>Mpesa</option>
                                <option>Cash</option>
                            </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label>Amount Paid <span class="text-danger">*</span></label>
                                <input class="form-control" id="total_paid" name="total_paid" required   type="number">
                            </div>

                             <div class="form-group col-md-12">
                                <label>Payment Ref <span class="text-danger">*</span></label>
                            <input class="form-control" id="pay_ref" name="pay_ref"  required  type="text">
                            </div>

                           


                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Order</button>
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
                    url: "/get-payment/" + id,
                    method: 'GET',

                    success: function(data) {

                        console.log(data);
                      
                        $('#total_cost').val(data);
                    
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
