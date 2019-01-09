<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Category_post;
use App\Comment;
use Session;
use Image;
use Storage;
use Auth;
use App\User;



class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function index()
    {
        //$posts = Post::paginate(5);
        $posts = Post::all();
        //dd(Post::get());
        $categories = Category::all();
        foreach ($categories as $category)
        {
            if (isset($_GET['category_id']) && $category->id == $_GET['category_id'])
            {
                $posts = Category_post::posts($category->id);
                //$posts = Category_post::where('category_id', )
                //$posts = $category->posts($category->id);
            }
        }
        //dd($posts);
        //$posts = collect($posts);
        //$posts = paginate($posts);
        //dd($posts);
        if (!isset($_GET['category_id']))
        {
            //dd($_GET['category_id']);
            $category_id = 0;
            return view('posts.index', compact('posts'))->with(compact('categories'))->with(compact('category_id'));
        }
        //dd($posts);
        //dd($_GET['category_id']);
        return view('posts.index', compact('posts'))->with(compact('categories'))->with('category_id', $_GET['category_id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = (new Category)->get();
        return view('posts.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request); 
        //dd($this);  
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required|min:10',
            'category' => 'required|integer',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'

        ));
        
        //dd($request->all());

        $post = new Post;
        $categorie_post = new Category_post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->price = $request->price;
        $post->create_by = Auth::user()->id;
        if ($request->hasFile('upload_img'))
        {
            
            $img=$request->file('upload_img');
            $filename = time().'.'.$img->getClientOriginalExtension();
            $location = public_path('images/articles/'.$filename);
            $img_file=Image::make($img);
            Image::make($img)->save($location);
            $oldFile=$post->image;
            $post->image=$filename;
            Storage::delete($oldFile);
            //dd($img);
        }
        $post->save();
        $categorie_post->post_id = $post->id;
        $categorie_post->category_id = $request->category;
        $categorie_post->save();

        Session::flash('success', "l'article a été publié");

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $post->id)->get();
        $users = User::all();
        return view('posts.show')->with(compact('post'))->with(compact('comments'))->with(compact('users'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = (new Category)->get();
        return view('posts.edit')->with(compact('post'))->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required|min:10',
            'category' => 'required|integer'
        ));
        $post = Post::find($id);
        //$categorie_post = new Category_post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('upload_img'))
        {
            $img=$request->file('upload_img');
            $filename = time().'.'.$img->getClientOriginalExtension();
            $location = public_path('images/articles/'.$filename);
            $img_file=Image::make($img);
            Image::make($img)->save($location);
            $oldFile=$post->image;
            $post->image=$filename;
            Storage::delete($oldFile);
        }
        $post->save();

        $categorie_post = Category_post::where('post_id', $post->id)->first();
        //$categorie_post->post_id = $post->id;
        $categorie_post->category_id = $request->category;
        $categorie_post->save();

        Session::flash('success', 'This post was successifuly saved.');
        return redirect()->route('posts.show', $post->id);
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = POST::find($id);
        $category_post = Category_post::where('post_id', $id);
        $post->delete();
        $category_post->delete();
        Session::flash('success', 'The post wa succefully delete!');
        return redirect()->route('posts.index');
    }
}
