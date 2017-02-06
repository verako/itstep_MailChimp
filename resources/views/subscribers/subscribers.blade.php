
@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
   	<div class="col-md-2" >
   		<ul class="nav">
   			<li><a href="subscribers">Subscriber List</a></li>
   			<li><a href="subscribers">Send mail</a></li>
   			<li><a href="subscribers">Setting</a></li>
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
               <div class="panel-heading">Subscriber</div>
               <div class="panel-body">
               		<h3>Subscriber List</h3>
					<a href="subscribers/create">Add New</a>
					<table class="table">
						<thead>
					      <tr>
					        <th>Firstname</th>
					        <th>Lastname</th>
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
	  								<input type="submit" value="Edit">
	  								{{ csrf_field() }}
									</form>
								</td>
								<td>
								
									<form class="form-delete" method="post" action="{{ url('/subscribers/'.$subscriber['id']) }}">
									{{ method_field('DELETE') }}
									<input type="submit" value="Delete">
									{{ csrf_field() }}
									</form>
									
								</td>
								
							</tr>
							@endforeach
					     	
					     
					      
					    </tbody>
					</table>
                  
               </div>
           </div>
       </div>
   </div>
</div>

 
@endsection