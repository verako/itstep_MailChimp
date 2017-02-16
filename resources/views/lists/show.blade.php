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
		               <div class="col-md-2">
		                   <a class="btn btn-default" href="{{url('/lists/create')}}">{{trans('listindex.Add')}}</a>
		               </div>
		           </div>
		       </div>
		       <div class="panel-body">
				   <table class="table table-striped task-table">

						   <!-- Table Headings -->
				   <thead>
				   <th>{{trans('listindex.subscribers')}}</th>
						<th></th>
						<th></th>
						   </thead>
						    @foreach($list_subscribers as $sublist)
						   	<tr>
						   		<td class="table-text">
						   			<div>{{$sublist->email}}</div>
						   		</td>
						   		<td>
						   			<form action="{{url('/lists/addsubscriber')}}" method="post">
										{{ csrf_field() }}
										{{ method_field('GET') }}
										<button class="btn btn-success">{{trans('listindex.edit')}}</button>
						   			</form>
						   		</td>
						   		<td>
						   			<form class="form-delete" method="post" action="{{ url('/lists/'.$list->id) }}">
							   			{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<input type="submit" value="{{trans('listindex.delete')}}">
									</form>
						   		</td>
						   	</tr>
						   	@endforeach

						   <!-- Table Body -->
						   <tbody>
						   

						   </tbody>
					</table>
					
		       </div>
		   </div>
	   </div>
	</div>
</div>
@endsection