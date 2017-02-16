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
                <div class="panel-heading">{{trans('settingsindex.settings')}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/settings') }}">
                        <select name="setting">
                            <option value="PHP">PHP</option>
                            <option value="SMPT">SMPT</option>
                            <option value="Mandrill">Mandrill</option>
                        </select>
                        <input type="submit" value="OK">
                    </form>
                   

                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
