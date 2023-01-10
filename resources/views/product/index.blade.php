@extends('layouts.template')
@section('extracss')
<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
<style type="text/css">
	.avatar {
  background-color: transparent;
  color: #ffffff;
  display: inline-block;
  font-weight: 500;
  height: 48px;
  line-height: 38px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  vertical-align: middle;
  width: 48px;
  position: relative;
  white-space: nowrap;
  margin: 0 10px 0 0;
  border-radius: 50%;
}
.avatar.avatar-xs {
  width: 24px;
  height: 24px;
}
.avatar > img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  border-radius: 50%;
}
.avatar .avatar-title {
  width: 100%;
  height: 100%;
  background-color: #0d6efd;
  color: #ffffff;
}
.avatar.avatar-online::before {
  width: 25%;
  height: 25%;
  border-radius: 50%;
  content: "";
  border: 2px solid #ffffff;
  position: absolute;
  right: 0;
  bottom: 0;
  background-color: #55ce63;
}
.avatar.avatar-offline::before {
  width: 25%;
  height: 25%;
  border-radius: 50%;
  content: "";
  border: 2px solid #ffffff;
  position: absolute;
  right: 0;
  bottom: 0;
  background-color: #f62d51;
}
.avatar.avatar-away::before {
  width: 25%;
  height: 25%;
  border-radius: 50%;
  content: "";
  border: 2px solid #ffffff;
  position: absolute;
  right: 0;
  bottom: 0;
  background-color: #ffbc34;
}
.avatar .border {
  border-width: 3px !important;
}
.avatar .rounded {
  border-radius: 6px !important;
}
.avatar .avatar-title {
  font-size: 18px;
}
.avatar .avatar-xs {
  width: 1.65rem;
  height: 1.65rem;
}
.avatar .avatar-xs .border {
  border-width: 2px !important;
}
.avatar .avatar-xs .rounded {
  border-radius: 4px !important;
}
.avatar .avatar-xs .avatar-title {
  font-size: 12px;
}
.avatar .avatar-xs.avatar-away::before, .avatar .avatar-xs.avatar-offline::before, .avatar .avatar-xs.avatar-online::before {
  border-width: 1px;
}

.avatar-sm {
  width: 2.5rem;
  height: 2.5rem;
}
.avatar-sm .border {
  border-width: 3px !important;
}
.avatar-sm .rounded {
  border-radius: 4px !important;
}
.avatar-sm .avatar-title {
  font-size: 15px;
}
.avatar-sm.avatar-away::before, .avatar-sm.avatar-offline::before, .avatar-sm.avatar-online::before {
  border-width: 2px;
}

.avatar-lg {
  width: 3.75rem;
  height: 3.75rem;
}
.avatar-lg .border {
  border-width: 3px !important;
}
.avatar-lg .rounded {
  border-radius: 8px !important;
}
.avatar-lg .avatar-title {
  font-size: 24px;
}
.avatar-lg.avatar-away::before, .avatar-lg.avatar-offline::before, .avatar-lg.avatar-online::before {
  border-width: 3px;
}

.avatar-xl {
  width: 5rem;
  height: 5rem;
}
.avatar-xl .border {
  border-width: 4px !important;
}
.avatar-xl .rounded {
  border-radius: 8px !important;
}
.avatar-xl .avatar-title {
  font-size: 28px;
}
.avatar-xl.avatar-away::before, .avatar-xl.avatar-offline::before, .avatar-xl.avatar-online::before {
  border-width: 4px;
}

.avatar-xxl {
  width: 5.125rem;
  height: 5.125rem;
}
@media (min-width: 768px) {
  .avatar-xxl {
    width: 8rem;
    height: 8rem;
  }
}
.avatar-xxl .border {
  border-width: 6px !important;
}
@media (min-width: 768px) {
  .avatar-xxl .border {
    border-width: 4px !important;
  }
}
.avatar-xxl .rounded {
  border-radius: 8px !important;
}
@media (min-width: 768px) {
  .avatar-xxl .rounded {
    border-radius: 12px !important;
  }
}
.avatar-xxl .avatar-title {
  font-size: 30px;
}
@media (min-width: 768px) {
  .avatar-xxl .avatar-title {
    font-size: 42px;
  }
}
.avatar-xxl.avatar-away::before, .avatar-xxl.avatar-offline::before, .avatar-xxl.avatar-online::before {
  border-width: 4px;
}
@media (min-width: 768px) {
  .avatar-xxl.avatar-away::before, .avatar-xxl.avatar-offline::before, .avatar-xxl.avatar-online::before {
    border-width: 4px;
  }
}

.avatar-group .avatar + .avatar {
  margin-left: -1.5rem !important;
}
.avatar-group .avatar:hover {
  z-index: 1;
}
.avatar-group .avatar-xs + .avatar-xs {
  margin-left: -0.40625rem;
}
.avatar-group .avatar-sm + .avatar-sm {
  margin-left: -0.625rem;
}
.avatar-group .avatar-lg + .avatar-lg {
  margin-left: -1rem;
}
.avatar-group .avatar-xl + .avatar-xl {
  margin-left: -1.28125rem;
}

.avatar-xs {
  width: 1.65rem;
  height: 1.65rem;
}

.task-avatar a {
  font-weight: 600;
  font-size: 12px;
  color: #7B024B ;
}

</style>
@endsection
@section('extrajs')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('myfiles/css/buttons.dataTables.min.css')}}">
<script src="{{asset('myfiles/js/dataTables.buttons.min.js')}}"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
@endsection
@section('content')
<div class="col-md-12">
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Product</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="">Dashboard</a></li>
					<li class="breadcrumb-item active">Product</li>
				</ul>
			</div>

			<a href="#" class="btn btn-success btn-add-emp" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add A Product</a>

		</div>
	</div>
		{{ $dataTable->table(['class' => 'table table-bordered table-striped table-sm small']) }}
		@push('scripts')
		{{$dataTable->scripts()}}
		@endpush

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					  {!! Form::open(['method'=> 'post','url' => 'product_store', 'files' => true ]) !!}
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
			
						<div class="modal-body">
							<div class="row">
							<div class="form-group col-md-12">
								<label>Product Name <span class="text-danger">*</span></label>
							<input class="form-control" placeholder="Product Name" name="product_name" type="text">
							</div>

							<div class="form-group col-md-6">
								<label>Product Price <span class="text-danger">*</span></label>
							<input class="form-control" placeholder="Product Price" name="sell_price" type="number">
							</div>

							<div class="form-group col-md-6">
								<label>Quantity <span class="text-danger">*</span></label>
							<input class="form-control" placeholder="Product Qty" name="quantity" type="number">
							</div>

							<div class="form-group col-md-6">
								<label>Category<span class="text-danger">*</span></label>
								<input class="form-control" placeholder="category" name="category" type="text">
							</div>

							<div class="form-group col-md-6">
								<label>Photo<span class="text-danger">*</span></label>
								<input class="form-control" placeholder="photos" name="photos" type="file">
							</div>

								<div class="form-group col-md-12">
								<label>Description<span class="text-danger">*</span></label>
								<textarea rows="2" name="description" class="col-md-12"></textarea>
							</div>

						
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
				{!!Form::close()!!}
			</div>


<div class="modal custom-modal fade" id="delete_expense" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			
			<div class="modal-body">
				<div class="form-header">
					<h3>Delete </h3>
					<p>Are you sure want to delete?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							{!! Form::open(['method'=> 'get','url' => 'delete-product', 'files' => true ]) !!}

							<input type="hidden" id="task_ids" name="ids">
							<button type="submit" id="SubmitCreateProductForsm" class="btn btn-primary form-control">Delete </button>
						{!!Form::close()!!}

						</div>
						<div class="col-6">							 
							<button type="button" class="btn btn-danger form-control modelClose" data-dismiss="modal">Cancel</button>							
						</div>
					</div>
				</div>
			</div>
				
		</div>
	</div>
</div>


	<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-userLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					  {!! Form::open(['method'=> 'post','url' => 'product_store', 'files' => true ]) !!}
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
				{!!Form::close()!!}
			</div>



<script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
<script type="text/javascript">

	$('.modelClose').on('click', function(){
		$('#modal-user').hide();
	});
	var id;
	$('body').on('click', '#getEditProductData', function(e) {
		e.preventDefault();
		$('.alert-danger').html('');
		$('.alert-danger').hide();
		id =  $(this).val();
		$.ajax({
			url: "/get-product/"+id,
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
		id =  $(this).val();
		$.ajax({
			url: "/get-product/"+id,
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