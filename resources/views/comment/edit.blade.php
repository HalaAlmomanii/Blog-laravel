@extends('layouts.app')



@section('content')
{{--    <form method="Post" action="/Post/{{$Post['id']}}" >--}}
{{--        @csrf--}}
{{--{{method_field('PATCH')}}--}}

@if(count($Post)>0)

<div class="card-header">
    <h1>
{{$Post[0]->post['title']}}
    </h1>
    <div class="card-body">
   <h4> {{$Post[0]->post['body']}}</h4>

    </div>
</div>



<br>



<div class="card" style="width: 125rem;">
  <div class="card-header">
   <h4> Comments</h4>
  </div>
  <ul class="list-group list-group-flush">
      @foreach($Post as $elem=>$val)


          <li class="list-group-item">
              <p>  {{$val->body}}</p>

              <h6> written by: {{$val['user']->name}}</h6>

 @auth
        @if(Auth::id()===$val->author)
 <form method="Post" action="/Comment/{{$val->id}}" >
        @csrf
{{method_field('DELETE')}}


        <button type="submit" class="btn btn-danger">Delete Comment</button>


</form>
            @endif
    @endauth
          </li>

        @endforeach


  </ul>
</div>


<br>


@else

<div class="card-header">
    <h1>
{{$blog->title}}
    </h1>
    <div class="card-body">
   <h4> {{$blog->body}}</h4>

    </div>


</div>



    <h1>there is no comment yet</h1>
@endif
@auth
 <form method="Post" action="/Comment/{{$id}}" >
        @csrf
{{method_field('PATCH')}}
 <input type="text" name="body" class="form-control" style="height: 3rem;" placeholder="Enter comment">

        <button type="submit" class="btn btn-primary">Comment</button>


</form>
    @endauth



@endsection
