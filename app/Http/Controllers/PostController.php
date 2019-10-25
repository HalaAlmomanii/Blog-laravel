<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

public function landing()
    {
        $author=Post::with('user')->get();

        return view('welcome',compact('author'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author=Auth::id();
        Post::create(
        [ 'title'=>$request['title'],
            'body'=>$request['body'],
            'author'=>$author]
    );
//      $name= Auth::user()->name ;
////        $user_id=Auth::id();
////        $name=Auth::name();
//        dd($name);
return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $user=User::all();
         $author=Post::with('user')->get();
//return $author;

        return view('Post.store',['author'=>$author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Post = Post::find($id);

       return view('Post.edit',compact('Post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $update= Post::find($id);
        $update->title=request('title');
    $update->body=request('body');
     $update->save();
       return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect('home');
    }

     public function myprofile()
    {
        $author=Auth::id();
       $post=Post::with('user')->where('author',$author)->get();
       return view('Post.profile',compact('post')) ;
    }
//
//     public function delete()
//    {
//      dd("delete");
//    }
}
