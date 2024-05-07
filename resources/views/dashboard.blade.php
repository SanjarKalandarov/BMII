@if(auth()->user()->getRoleNames()[0]=='student'||auth()->user()->getRoleNames()[0]=='taacher')
@include('button')
@elseif(auth()->user()->getRoleNames()[0]=='admin')
@include('adminpanel.master')
    @endif;


