<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;



class PageController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('updated_at', 'desc')->limit(4)->get();
        //$this->contact();
        return view('pages.welcome')->with(compact('posts'));
    }

    public function getAbout(){
        $first = 'Alex';
        $last = 'Wu';

        $full = $first." ".$last;
        return view('pages.About')->with(compact('full'));
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function contact(){
        $mail = app()['mailer'];
        $mail->send('auth.emails.contact', ['username'=>'test'],function($message){
            $message->to('935441060@qq.com')->subject('titre');
        });
    }
}
