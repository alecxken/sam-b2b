<div  class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
   {!! Form::open(['method'=> 'post','url' => 'users_update', 'files' => true ]) !!}
   <input type="hidden" id="task_id" name="id">

   <div class="modal-content modal-content-demo">
     <div class="modal-header">
        <h6 class="modal-title">Edit Creation Portal</h6>
        <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">

    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Null, array('id' => 'name','class' => 'form-control', 'readonly')) }}
        </div>


        <div class="form-group col-md-12">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', Null, array('id' => 'email','class' => 'form-control', 'readonly')) }}
        </div>
     <!--    <div class="form-group col-md-12">
            {{ Form::label('name', 'Username') }}
            {{ Form::text('username', Null, array('id' => 'username','class' => 'form-control')) }}
        </div>

          <div class="form-group col-md-12">
            {{ Form::label('name', 'Users Pin') }}
            {{ Form::text('pin', Null, array('id' => 'pin','class' => 'form-control')) }}
        </div> -->

        

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
        <button type="submit" id="SubmitCreateProductForsm" class="btn btn-outline-success">Submit </button>
        <button type="button" class="btn btn-outline-danger modelClose" data-dismiss="modal">Close</button>
    </div>
</div>
{!!Form::close()!!}
</div><!-- modal-dialog -->
</div>
</div>
