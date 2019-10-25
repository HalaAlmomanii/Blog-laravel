<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('comment.edit');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {return view('comment.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   $blog = Post::find($id);
        $Post=Comment::with('post')->where('post_id',$id)->get();
//   $Post2=Comment::with('user')->where('author',$author)->get();
//return $Post;
       return view('comment.edit',compact('Post','id','blog'));





//       return view('Post.profile',compact('post')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


       Comment::create(
            [  'post_id'=>$id,
                'body'=>$request['body'],
                'author'=>Auth::id()]
        );

  $Post=Comment::with('post')->where('post_id',$id)->get();

  return view('comment.edit',compact('Post','id'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $comment= Comment::find($id);

        $comment->delete();
        return redirect("/Comment/{$comment->post_id}");
    }
}
