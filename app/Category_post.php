<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    //
    public static function posts($category_id){
        $list = Category_post::where('category_id', $category_id)->get();
        
        $array = array();
        foreach ($list as $data)
        {
            array_push($array, Post::find($data->post_id));
        }
        //dd($array);
        return $array;
    }

    public static function categories($post_id){
        $list = Category_post::where('post_id', $post_id)->get();
        
        $array = array();
        foreach ($list as $data)
        {
            array_push($array, Category::find($data->category_id));
        }
        //dd($array);
        return $array;
    }
}
