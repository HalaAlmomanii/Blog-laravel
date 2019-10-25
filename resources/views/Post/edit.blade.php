@extends('layouts.app')



@section('content')
    <form method="Post" action="/Post/{{$Post['id']}}" >
        @csrf
{{method_field('PATCH')}}
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="{{$Post['title']}}" name="title"class="form-control"  placeholder="Enter body">
        </div>
        <div class="form-group">
            <label >Body</label>
            <input type="text "value="{{$Post['body']}}"  name="body" class="form-control"  placeholder="Enter body">
        </div>

        <button type="submit" class="btn btn-primary">Save changes</button>


    </form>
@endsection
