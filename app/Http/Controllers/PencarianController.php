<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PencarianController extends Controller
{
    //

    public function setPencarian()
    {
        //
        $keyword = Input::get('searchkey');
        $filter = Input::get('searchopt');
        //$posts = Post::all();
       // $posts
        if ($keyword != ""){
            if ($filter == "judul"){
                $posts = Post::where('judul_event', 'LIKE', '%' . $keyword . '%')->paginate(10);
            }
            else{
                $posts = Post::where('lokasi', 'LIKE', '%' . $keyword . '%')->paginate(10);

            }
            return view("pages.v_pencarian_page")->with("posts", $posts)->with("keyword", $keyword)->with("filter", $filter);

        }
        else{

        }



    }
}
