<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
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
        $posts = Post::with(['category','user'])->orderBy('id','desc')->paginate(5);
        return view('blogui.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('blogui.post.create', compact(['categories', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'title' => 'min:5',
            'content' => 'min:7',
        ]);

        Post::create($request->all());

        //return view('blogui.user.index')->with('success','Usercreated successfully.');
        return redirect()->route('posts.index')->with('success', 'User created successfully.');
        // $validatedData=$request->validate([

        //     'user_id'=>'nullable',
        //     'title'=>'min:5',
        //     'content'=>'min:7',


        //   //  'title' => 'required|string|min:3|max:30',
        // //     'email' => 'email',
        // //    // 'email' => 'email|unique:users,email,except,id',
        // //     'password' => 'required|min:7|max:20',
        // ]);

        //  $userID=Auth::user()->id;
        // // $validatedData += $userID;
        // // $post=Post::create($validatedData);

        // $post =new Post;
        // $post->user_id=$userID;
        // $post->title=$validatedData['title'];
        // $post->content=$validatedData['content'];
        // $post->category_id=$validatedData['category'];

        // $post->save();

        //return view('blogui.user.index')->with('success','Usercreated successfully.');
        //return redirect()->route('posts.index')->with('success','post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blogui.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('blogui.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'max:50',
            'content' => 'min:7',

        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->route('posts.index')->with('success','Post deleted successfully.');
    }
}
