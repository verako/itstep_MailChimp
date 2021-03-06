
@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">
					<div class="row">
		               <div class="col-md-10">
		                   {{trans('subscribersindex.subscriber')}}
		               </div>
		               <div class="col-md-2">
		              
		                   <a class="btn btn-default" href="{{url('subscribers/create')}}">{{trans('subscribersindex.add')}}</a>
		               </div>
		            </div>
              </div>
              <div class="panel-heading">
		                @if($subscriber->exists===true)
						{{trans('subscribersindex.editsub')}}
						@else
						{{trans('subscribersindex.add')}}
						@endif
	       
		       </div>
               <div class="panel-body"> 
               		
               		<!-- <h3>{{trans('subscribersindex.')}}</h3> -->
										
					<form class="form-horizontal" role="form" method="post" action="{{ url('/subscribers/'.$id) }}">
						<input type="hidden" name="_method" value="put">
						{{ csrf_field() }}
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
						   <label for="first_name" class="col-md-4 control-label">{{trans('subscribersindex.firstname')}}</label>

						   <div class="col-md-6">
							   <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $first_name or old('first_name') }}" required autofocus>

							   @if ($errors->has('first_name'))
							   <span class="help-block">
								   <strong>{{ $errors->first('first_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">{{trans('subscribersindex.lastname')}}</label>

						   <div class="col-md-6">
							   <input id="last_name" type="text" class="form-control" name="last_name" required value="{{ $last_name }}">

							   @if ($errors->has('last_name'))
								   <span class="help-block">
								   <strong>{{ $errors->first('last_name') }}</strong>
							   </span>
							   @endif
						   </div>
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						   <label for="last_name" class="col-md-4 control-label">Email</label>

						   <div class="col-md-6">
							   <input id="email" type="email" class="form-control" name="email" required value="{{$email or old('email') }}">

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
								   {{trans('subscribersindex.entry')}}
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