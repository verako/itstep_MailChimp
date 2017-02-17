@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
	   	<div class="col-md-2" >
	   	<!-- @yield('nav') -->
	   		<ul class="nav">
	   			<li><a href="../subscribers">{{trans('homeindex.SubscriberList')}}</a></li>
	            <li><a href="../send-email">{{trans('homeindex.SendMail')}}</a></li>
	            <li><a href="../settings">{{trans('homeindex.Setting')}}</a></li>
	            <li><a href="../lists">{{trans('homeindex.Lists')}}</a></li>
	   		</ul>
	 	</div>
	   <div class="col-md-8 col-md-offset-1">
		   <div class="panel panel-default">
			   @if ( \Session::has('flash_message') )
				   <div class="alert alert-success alert-dismissable">
				       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    {{\Session::get('flash_message')}}
				   </div>
				@endif
		       <div class="panel-heading">
		           <div class="row">
		               <div class="col-md-10">
		                   {{trans('listindex.Lists')}}
		               </div>
		               
		           </div>
		       </div>
		       <div class="panel-body">
				   <table class="table table-striped task-table">

						   <!-- Table Headings -->
					   <thead>
					   		<th>{{trans('listindex.subscribers')}}</th>
							<th></th>
						</thead>
						<tbody>
						    @foreach($list_subscribers as $sublist)
						   	<tr>
						   		<td class="table-text">
						   			<div>{{$sublist->email}}</div>
						   		</td>
						   		
						   		<td>
						   			<form class="form-delete" method="post" action="{{ url('/lists/delsubscriber') }}">
							   			{{ csrf_field() }}
										
										<input type="hidden" name="subscriber_id" value="{{$sublist->id}}">
										<input type="hidden" name="list_id" value="{{$list->id}}">
										<!-- <input type="submit" value="{{trans('listindex.delete')}}"> -->
										<button class="btn btn-success">{{trans('listindex.delete')}}</button>
										
									</form>
						   		</td>
						   	</tr>
						   	@endforeach

						   <!-- Table Body -->
						   
						   

						</tbody>
					</table>
					
		       </div>
		   </div>
	   </div>
	</div>
	<div class="row">
		<div class="panel-body">
			<table class="table table-striped task-table">
				<thead>
					<th>{{trans('listindex.addsubscribers')}}</th>
					<th></th>
				</thead>
				<tbody>
				@foreach($subscriberss as $subscr)
					<tr>
						<td class="table-text">
							<div>{{$subscr->email}}</div>
						</td>
						<td>
				   			<form class="form-delete" method="post" action="{{ url('/lists/addsubscriber') }}">
							   	{{ csrf_field() }}
								<input type="hidden" name="subscriber_id" value="{{$subscr->id}}">
								<input type="hidden" name="list_id" value="{{$list->id}}">
								<!-- <input type="submit" value="{{trans('listindex.delete')}}"> -->
								<button class="btn btn-success">{{trans('listindex.Add')}}</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection