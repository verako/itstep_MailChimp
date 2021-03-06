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
                <div class="panel-heading">{{trans('homeindex.home')}}</div>

                <div class="panel-body">
                   {{trans('homeindex.hello')}} {{ Auth::user()->email }}


                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
