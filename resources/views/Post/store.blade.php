@extends('layouts.app')

@section('content')





@foreach($author as $elem=>$val)

<div class="card" style="width: 18rem;">
    <h5 class="card-title">{{$val->title}}</h5>


    <p class="card-text">{{$val->body}}</p>
<p class="card-text">{{$val->user->name}}</p>
    <div class="card-body">

    </div>
</div>

@endforeach

@endsection
