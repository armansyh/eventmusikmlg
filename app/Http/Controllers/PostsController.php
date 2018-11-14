<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $msg = "";
            return view('posts.v_myPost')->with('posts', $user->posts)->with('message', $msg);

//                return view('posts.myPost')->with('posts', $post)->with('message', $msg);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.v_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $this->validate($request, [
            'judul' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'jam' => 'required',
            'desc' => 'required',
            'img_poster' => 'image|mimes:jpeg,png,bmp,tiff|nullable|max:1999'
        ]);

        //handle file upload
        if ($request->hasFile('img_poster')){
            //get filename with ext
            $filenameWithExt = $request->file('img_poster')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img_poster')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img_poster')->storeAs('public/img_poster', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noImg.jpg';
        }
        //make post
        $post = new Post;
        $post->judul_event = $request->input('judul');
        $post->lokasi = $request->input('lokasi');
        $post->tanggal = $request->input('waktu');
        $post->jam = $request->input('jam');
        $post->deskripsi = $request->input('desc');
        $post->img_poster = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $owner = User::find($post->user_id);


        $post->save();
        $msg = "Event berhasil ditambahkan";

//        return view('posts.myPost')->with('success', 'Post Created')->with("message", $msg);
        //return view('posts.show')->with('posts', $user->posts)->with('message', $msg);
        return view('posts.v_show')->with('post', $post)->with('message', $msg)->with("owner", $owner->name);





        // return 123;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $owner = User::find($post->user_id);
        $msg = "";
        return view('posts.v_show')->with('post', $post)->with('message', $msg)->with("owner", $owner->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (auth()->user()->id == $post->user_id || auth()->user()->id == 1){
            return view('posts.v_edit')->with('post', $post);
        }
        else{
            return redirect('/');
        }
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

        $this->validate($request, [
            'judul' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'jam' => 'required',
            'desc' => 'required',
            'img_poster' => 'image|mimes:jpeg,png,bmp,tiff|nullable|max:1999'

        ]);

        //handle file upload
        if ($request->hasFile('img_poster')){
            //get filename with ext
            $filenameWithExt = $request->file('img_poster')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('img_poster')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('img_poster')->storeAs('public/img_poster', $fileNameToStore);
        }
//        else{
//            $fileNameToStore = 'noImg.jpg';
//        }

        $post = Post::find($id);
        $post->judul_event = $request->input('judul');
        $post->lokasi = $request->input('lokasi');
        $post->tanggal = $request->input('waktu');
        $post->jam = $request->input('jam');
        $post->deskripsi = $request->input('desc');
        if ($request->hasFile('img_poster')){
            $post->img_poster = $fileNameToStore;
        }
        $post->save();

        $owner = User::find($post->user_id);


        $msg = 'Edit Event Berhasil';

       // return view('posts.show')->with('post', $post)->with('message', $msg)->with('owner', $owner->name);
        return view('posts.v_show')->with('post', $post)->with('message', $msg)->with("owner", $owner->name);


        // return redirect('/posts/')->with('success', 'Edit Event Berhasil');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts');

    }
}
