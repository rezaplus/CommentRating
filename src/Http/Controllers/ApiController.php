<?php

namespace rezaplus\cmr\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use rezaplus\cmr\Models\wp_comments;
use rezaplus\cmr\Models\wp_posts;

class ApiController extends Controller
{
    /**
     * insert data
     * piority is important
     */
    public function insert(Request $request)
    {
        //step one
        $this->importComment($request);
        //step two
        $this->importUpdatePost($request);
    }

    /**
     * import or update post details from wordpress
     */
    public function importUpdatePost(Request $request)
    {
        $this->validate($request,
            [
                'post_id'   => 'required',
                'post_title'   => 'required'
            ]
            );
        
        // get post comments count
        $comment_count = wp_comments::where('post_id', $request->get('post_id'))->count();
        // get post comments rate
        $comment_sum = wp_comments::where('post_id', $request->get('post_id'))->sum('rate');
        // SQL Query
        wp_posts::updateOrCreate(
            ['post_id' => $request->get('post_id')],
            [
                'post_id' => $request->get('post_id'),
                'title' => $request->get('post_title'),
                'comments_count' => $comment_count,
                'post_rate' => $comment_sum / $comment_count,
            ]
        );
    }

    /**
     * import post comments details from wordpress
     */
    public function importComment(Request $request)
    {
        $this->validate($request,
            [
                'post_id'   => 'required|integer',
                'comment_id'   => 'required|integer',
                'comment_author'   => 'required|string',
                'content'   => 'required|string',
                'rate'   => 'required'
            ]
            );
        if ($request->get('post_id')) {
            // SQL Query
            return wp_comments::create([
                'post_id' => $request->get('post_id'),
                'comment_id' => $request->get('comment_id'),
                'comment_author' => $request->get('comment_author'),
                'content' => $request->get('content'),
                'rate' => $request->get('rate'),
            ]);
        }
    }
}
