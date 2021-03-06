<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomePageController extends Controller
{
    //

    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view("pages.v_homepage")->with("posts", $posts);
    }
}
