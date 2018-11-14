<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = 'posts';

    //primarykey
    public $postId = 'id';

//    public static $judul = 'judul_event';
//    public $lokasi = 'lokasi';
//    public $waktu = 'waktu';
//    public $deskripsi = 'deskripsi';
//    public $userId = 'user_id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
