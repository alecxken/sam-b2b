
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
				<h3 class="page-title">Roles & Permissions</h3>
				<ul class="breadcrumb">
					
				</ul>
			</div>

		<!-- 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Add A User
			</button> -->


		<!-- 	<a href="#" class="btn btn-primary btn-add-emp" data-toggle="modal" data-target="#add-permissions"><i class="fa fa-plus"></i> Add New Roles</a>
			<a href="#" class="btn btn-primary btn-add-emp" data-toggle="modal" data-target="#add_roles"><i class="fa fa-plus"></i> New Permissions</a>

			<a href="{{url('create_user')}}" class="btn btn-success btn-add-emp" ><i class="fa fa-plus"></i> Assign Users Roles</a> -->
			<div class="btn-group">
<a href="#" class="btn btn-primary btn-add-emp" data-toggle="modal" data-target="#add-permissions"><i class="fa fa-plus"></i> Add New Roles</a>
						<a href="#" class="btn btn-warning btn-add-emp" data-toggle="modal" data-target="#add_roles"><i class="fa fa-plus"></i> Permissions</a>

						<a href="{{url('users-index')}}" class="btn btn-success btn-add-emp" ><i class="fa fa-plus"></i> Assign Users Roles</a>
			</div>


		</div>
	</div>
	<div class="col-md-12">

		<!-- Page Content -->
		<div class="content container-fluid">

			<!-- Page Header -->
		
				<!-- /Page Header -->

				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
						
						<div class="roles-menu">
							<ul>
								@if(!empty($roles))
								@foreach($roles as $r)
								<li class="">
									<a href="javascript:void(0);">{{$r->name}}
										<span class="role-action">
											<span class="action-circle large" data-toggle="modal" data-target="#edit_role">
												<i class="material-icons">edit</i>
											</span>
											<span class="action-circle large delete-btn" data-toggle="modal" data-target="#delete_role">
												<i class="material-icons">delete</i>
											</span>
										</span>
									</a>
								</li>

								@endforeach
								@endrole

							</ul>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">

						<div class="faq-card">
							@if(!empty($roles))
							@foreach($roles as $r)


							<div class="card">
								<div class="card-header">
									<h4 class="card-title">
										<a class="collapsed" data-toggle="collapse" href="#collapseOne">{{$r->name}} Role Permissions</a>
									</h4>
								</div>
								<div id="collapseOne" class="card-collapse collapse">
									<div class="card-body">
										<p><div class="m-b-30">
											<ul class="list-group notification-list">
												@php $access = str_replace(array('[',']','"'),'', $r->permissions()->pluck('name'));@endphp
												@foreach(explode(',',$access) as $title)
												<li class="list-group-item">
													{{$title}}
													<div class="status-toggle">
														<input type="checkbox" id="staff_module" class="check" checked>
														<label for="staff_module" class="checktoggle" >checkbox</label>
													</div>
												</li>
												@endforeach


											</ul>
										</div>  .</p>
									</div>
								</div>
							</div>
							@endforeach
							@endif    

						
						</div>



					</div>
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Add Role Modal -->
			
			<!-- /Add Role Modal -->

			<!-- Edit Role Modal -->
			<div id="edit_role" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-md">
						<div class="modal-header">
							<h5 class="modal-title">Edit Role</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label>Role Name <span class="text-danger">*</span></label>
									<input class="form-control" value="Team Leader" type="text">
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Role Modal -->

			<!-- Delete Role Modal -->
			<div class="modal custom-modal fade" id="delete_role" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Role</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Role Modal -->

		</div>

		@include('admin.add-role')

		@endsection