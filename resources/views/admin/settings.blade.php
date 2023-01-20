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
				<h3 class="page-title">Settingss</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="">Dashboard</a></li>
					<li class="breadcrumb-item active">Settingss</li>
				</ul>
			</div>

			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Add A Settings
			</button>

			<!-- Modal -->

		</div>
	</div>
	<div class="card mb-0">
		<div class="card-header">
			<h4 class="card-title mb-0">Settingss</h4>
		</div>
		<div class="card-body ">

			<div class="table-responsive">

				{{ $dataTable->table(['class' => 'table table-striped custom-table mb-0 table-sm small']) }}


			</div>

@push('scripts')
    {{$dataTable->scripts()}}
@endpush
  

		

		</div>
	</div>
</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<form method="POST" action="{{url('store-dropdowns')}}">
						@csrf
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>TABLE <span class="text-danger">*</span></label>
								
								  <select class="form-control" name="table_name" id="residence">
               <option  value="">SELECT TABLE</option>
               @foreach($tables as  $columns)
                         
                 <option>{{$columns->$dbname}}</option>
               @endforeach
             </select>


							</div>
							<div class="form-group">
								<label>COLUMN <span class="text-danger">*</span></label>
								  <select class="form-control input-sm" id="subresidence" name="column_name" >                        
                        <option value="">CHOOSE COLUMN</option>
                  </select>
							</div>
							<div class="form-group">
								<label>ITEM NAME <span class="text-danger">*</span></label>
								  <input type="text" name="dropdown_name" class="form-control input-sm">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			 <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript">
    
     $(document).ready(function() {

       var base_url = window.location.origin;
     var url = "get-column";


       $('#residence').change(function(){
         var tokenid = $(this).val();
        $.get(base_url + '/' + url + '/' + tokenid, function (data) {
            //success data
            document.getElementById("subresidence").innerHTML ="";
            document.getElementById("subresidence").innerHTML +='<option value=""> Choose Column </option>';
            console.log(data);
                for (i = 0; i < data.length; i++) {
                  var opt = document.createElement("option");
                  
       document.getElementById("subresidence").innerHTML += ' <option {{ old('source') == ' + data['reg_no'] + ' ? 'selected' : '' }} id="' + i + '">' + data['reg_no'] + '</option>';
                      }
                         })
                    });
} );
</script>
@endsection