@extends('layouts.app')

@section('content')





@foreach($post as $elem=>$val)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$val->title}}</h5>
    <p class="card-text">{{$val->body}}</p>


  </div>
    <br>

<form method="get"  action="/Post/{{$val->id}}/edit ">
  @csrf
  <button type="submit" class="btn btn-primary">Edit</button>
</form>

<br>
<form method="post"  action="/Post/{{$val->id}}">
{{method_field('DELETE')}}
    @csrf
  <button type="submit" class="btn btn-danger">Delete</button>
</form>
<br>
    <a href="/Comment/{{$val->id}}" class="btn btn-info"> View Details</a>
</div>



@endforeach

@endsection
