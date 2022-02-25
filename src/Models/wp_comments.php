<?php

namespace rezaplus\cmr\Models;

use illuminate\database\Eloquent\Model;

class wp_comments extends Model{

    protected $table = 'wp_comments';

    protected $fillable = ['post_id','comment_id','comment_author','content','rate'];

}