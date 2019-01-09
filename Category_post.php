<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    //
    /*
    public function get_posts($category_id)
    {
        $objs = Category_post::where('category_id', $category_id);
        $posts = array();
        foreach ($objs as $obj)
        {
            array_push($posts, Post::find($obj->find('post_id')));
        }
        dd($posts);
        return ($posts);
    }
    */
}
