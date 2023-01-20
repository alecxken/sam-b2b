
@extends('layouts.template')
@section('extracss')
<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">


@endsection
@section('extrajs')

<!-- <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script> -->
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
				<h3 class="page-title">Users</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="">Dashboard</a></li>
					<li class="breadcrumb-item active">Users</li>
				</ul>
			</div>

		<!-- 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Add A User
			</button> -->
			<a href="#" class="btn btn-success btn-add-emp" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Add A User</a>

		</div>
	</div>

	
		{{ $dataTable->table(['class' => 'table table-bordered table-striped table-sm small']) }}
		@push('scripts')
		{{$dataTable->scripts()}}
		@endpush
	
	
</div>

@include('admin.user-edit')

</div>
</div>
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
							{!! Form::open(['method'=> 'get','url' => 'users_delete', 'files' => true ]) !!}
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
			url: "get-user-info/"+id,
			method: 'GET',

			success: function(data) {

				console.log(data);
				$('#task_id').val(data.id);
					$('#task_ids').val(data.id);
				$('#name').val(data.name);
				$('#username').val(data.username);
				$('#pin').val(data.pin);
				$('#email').val(data.email);
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
			url: "get-user-info/"+id,
			method: 'GET',
			success: function(data) 
			{
				  console.log(data.id);				
					$('#task_ids').val(data.id);
					$('#delete_expense').show();
			}
		});
	});


	// $('#SubmitCreateProductForm').click(function(e) {
	// 	e.preventDefault();
	// 	$.ajaxSetup({
	// 		headers: {
	// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 		}
	// 	});

	// 	var csrf = $('input[name="_token"]').val();
	// 	$.ajax({

	// 		type:'POST',
	// 		url:'/users_update',
	// 		data: {
	// 			id: $('#id').val(),
	// 			name: $('#name').val(),
	// 			email: $('#email').val(),
	// 			roles: $('#roles').val(),
	// 			csrf: $('input[name="_token"]').val(),
	// 		},
	// 		success: function(result) {
	// 			if(result.errors) {
	// 				$('.alert-danger').html('');
	// 				$.each(result.errors, function(key, value) {
	// 					$('.alert-danger').show();
	// 					$('.alert-danger').append('<strong><li>'+value+'</li></strong>');
	// 				});
	// 			} else {
	// 				$('.alert-danger').hide();
	// 				$('.alert-success').show();
	// 				$('.datatable').DataTable().ajax.reload();
	// 				setInterval(function(){
	// 					$('.alert-success').hide();
	// 					$('#CreateProductModal').modal('hide');
	// 					location.reload();
	// 				}, 2000);
	// 			}
	// 		}
	// 	});
	// });
</script>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					  {!! Form::open(['method'=> 'post','url' => 'users_store', 'files' => true ]) !!}
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>User Name <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="name" name="name" type="text">
							</div>
							<div class="form-group">
								<label>User Email <span class="text-danger">*</span></label>
								<input class="form-control" placeholder="email" name="email" type="text">
							</div>
					<!-- 		<div class="form-group">
								<label>Username <span class="text-danger">*</span></label>
								<input class="form-control" name="username" placeholder="User name" type="text">
							</div>

								<div class="form-group">
								<label>Access Pin <span class="text-danger">*</span></label>
								<input class="form-control" maxlength="4" name="pin" value="xxxxxx" type="number">
							</div>
 -->


        <div class='form-group col-md-12'>
         
            <label><strong>Select User System Roles :</strong></label><br>
            @if(!empty($roles))
            @foreach ($roles as $role)
            <label><input type="checkbox" name="roles[]"  value="{{$role->name}}"> {{$role->name}}</label>
            @endforeach
            @endif
            
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


			@endsection