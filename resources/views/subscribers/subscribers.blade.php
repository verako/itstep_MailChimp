
@extends('layouts.app')

@section('content')


<div class="container">
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Subscriber</div>
               <div class="panel-body">

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
								<td><a href="">update</a></td>
								
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