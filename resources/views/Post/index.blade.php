@extends('layouts.app')



@section('content')
<form method="Post" action="/Post" >
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
  <input type="text" name="title"class="form-control"  placeholder="Enter body">
    </div>
    <div class="form-group">
        <label >Body</label>
        <input type="text"  name="body" class="form-control"  placeholder="Enter body">
    </div>

        <button type="submit" class="btn btn-primary">Share</button>


</form>
@endsection
