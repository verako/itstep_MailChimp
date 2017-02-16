
@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
   	<div class="col-md-2" >
   		<ul class="nav">
   			<li><a href="subscribers">{{trans('homeindex.SubscriberList')}}</a></li>
            <li><a href="send-email">{{trans('homeindex.SendMail')}}</a></li>
            <li><a href="settings">{{trans('homeindex.Setting')}}</a></li>
            <li><a href="lists">{{trans('homeindex.Lists')}}</a></li>
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
		                   {{trans('subscribersindex.subscriber')}}
		               </div>
		               <div class="col-md-2">
		                   <a class="btn btn-default" href="{{url('subscribers/create')}}">{{trans('subscribersindex.add')}}</a>
		               </div>
		           </div>
		       </div>
              
               <div class="panel-body">
               		<h3>{{trans('subscribersindex.SubscriberList')}}</h3>
					
					<table class="table">
						<thead>
					      <tr>
					        <th>{{trans('subscribersindex.firstname')}}</th>
					        <th>{{trans('subscribersindex.lastname')}}</th>
					        <th>Email</th>
					      </tr>
					    </thead>
					    <tbody>
					     
					     	@foreach($subscribers as $subscriber) 
					     	<tr>
					     		<td>{{$subscriber['first_name']}}</td>
								<td>{{$subscriber['last_name']}}</td>
								<td>{{$subscriber['email']}}</td>
								<td>
									<form action="{{ url('/subscribers/'.$subscriber['id'].'/edit')}}" method="get">
	  								<input type="submit" value="{{trans('subscribersindex.edit')}}">
	  								{{ csrf_field() }}
									</form>
								</td>
								<td>
								
									<form class="form-delete" method="post" action="{{ url('/subscribers/'.$subscriber['id']) }}">
									{{ method_field('DELETE') }}
									<input type="submit" value="{{trans('subscribersindex.delete')}}">
									{{ csrf_field() }}
									</form>
									
								</td>
								
							</tr>
							@endforeach
					     	
					     
					      
					    </tbody>
					</table>
                  {{$subscribers->links()}} <!-- paginate -->
               </div>
           </div>
       </div>
   </div>
</div>

 
@endsection