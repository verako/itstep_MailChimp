
@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Subscriber Add New</div>
               <div class="panel-body">
			   
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/subscribers') }}">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
						   <label for="first_name" class="col-md-4 control-label">First name</label>

						   <div class="col-md-6">
							   <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

							   @if ($errors->has('first_name'))
							   <span class="help-block">
								   <strong>{{ $errors->first('first_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">Last Name</label>

						   <div class="col-md-6">
							   <input id="last_name" type="text" class="form-control" name="last_name" required>

							   @if ($errors->has('last_name'))
								   <span class="help-block">
								   <strong>{{ $errors->first('last_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">E-Mail Address</label>

						   <div class="col-md-6">
							   <input id="email" type="email" class="form-control" name="email" required value="{{ old('email') }}">

							   @if ($errors->has('email'))
								   <span class="help-block">
								   <strong>{{ $errors->first('email') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						<div class="form-group">
						   <div class="col-md-8 col-md-offset-4">
							   <button type="submit" class="btn btn-primary">
								   Add
							   </button>
						   </div>
						</div>
					</form>
                  
               </div>
           </div>
       </div>
   </div>
</div>

 
@endsection