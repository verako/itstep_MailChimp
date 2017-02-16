@extends('layouts.app')
@section('content')


<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
           	@if ( \Session::has('flash_message') )
			   <div class="alert alert-success alert-dismissable">
			       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			       {{\Session::get('flash_message')}}
			   </div>
			@endif
               <div class="panel-heading">
                @if($list->exists===true)
				{{trans('listindex.edit')}}
				@else
				{{trans('listindex.Add')}}
				@endif

               </div>
               <div class="panel-body">
               	@if($list->exists===true)
               		<form class="form-horizontal" role="form" method="post" action="{{url('/lists',$list->id)}}">
               			{{method_field('PUT')}}
               	@else
               		<form class="form-horizontal" role="form" method="post" action="{{url('/lists')}}">
               			{{method_field('POST')}}
               	@endif
               			{{csrf_field()}}
               			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					   	<label for="name" class="col-md-4 control-label">{{trans('listindex.name')}}</label>

					   	<div class="col-md-6">
					       <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$list->name) }}" required autofocus>

					       @if ($errors->has('name'))
					           <span class="help-block">
					           <strong>{{ $errors->first('name') }}</strong>
					       </span>
					       @endif
					   </div>
					</div>
					<div class="form-group">
						<div class=" col-md-8 col-md-offset-8">
						<button type="submit" class="btn btn-primary">
						@if($list->exists===true)
						{{trans('listindex.edit')}}
						@else
						{{trans('listindex.Add')}}
						@endif
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