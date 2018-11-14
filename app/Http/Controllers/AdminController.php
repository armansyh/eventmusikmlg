<?php
/**
 * Created by PhpStorm.
 * User: Imam
 * Date: 11/11/2018
 * Time: 5:29 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class AdminController extends Controller
{
    public function allUser()
    {
        if (!auth()->guest()){
            if (auth()->user()->id == 1){
                $users = User::orderBy('id', 'desc')->where('id','!=', 1)->get();
//                $user_id = auth()->user()->id;
//                $user = User::find($user_id);
                $msg = "";
                //$post = Post::where('user_id', '=', auth()->user()->id)->paginate(10);

                return view('admin.v_allUser')->with('users', $users)->with('message', $msg);
            }
            else{
               return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

    }

    public function allPosts(){
        if (!auth()->guest()){
            if (auth()->user()->id == 1){
                $posts = Post::orderBy('created_at', 'desc')->get();
//                $user = User::find($user_id);
                $msg = "";
                //$post = Post::where('user_id', '=', auth()->user()->id)->paginate(10);

                return view('admin.v_allPost')->with('posts', $posts)->with('message', $msg);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    public function deleteUser($id)
    {
        if (auth()->user()->id == 1){
            if ($id !== 1){
                $user = User::find($id);
                $user->delete();
            }
            else{
                return redirect('/');

            }
        }
        else{
            return redirect('/');
        }


        return redirect('/allusers');

    }

    public function deletePost($id)
    {
        if (auth()->user()->id == 1){
                $post = Post::find($id);
                $post->delete();
        }
        else{
            return redirect('/');
        }


        return redirect('/allposts');

    }
}