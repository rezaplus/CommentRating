<?php

namespace rezaplus\cmr\Models;

use illuminate\database\Eloquent\Model;

class wp_posts extends Model{

    protected $table = 'wp_posts';

    protected $fillable = ['post_id','title','comments_count','post_rate'];

}