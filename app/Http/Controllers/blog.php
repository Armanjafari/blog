<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleValidator;
use App\Models\tag;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\DB;

class blog extends Controller
{
    //
    private $cats;
    private $articles;
    private $userdata;
    private $data;
    private $tags;

    public function __construct()
    {
        $this->userdata = auth()->user();
        $this->cats = Categories::all();
        $this->articles = post::all();
        $this->tags = tag::all();

    }

    public function index(ArticleValidator $request)
    {
        $valid_data = $request->validated();
        $article = auth()->user()->articles()->create([
            'text' => $request->input('text'),
            'title' => $request->input('title'),
            'cat_id' => $request->input('cat_id'),

        ]);
        $article->tags()->attach($request->input('tags'));
        return view("index", ['cats' => $this->cats, 'articles' => $this->articles, 'alltags' => $this->tags]);
    }

    public function create(Request $request)
    {
        return view("create", ['cats' => $this->cats,'alltags' => $this->tags]);


    }

    public function getindex(Request $request)
    {

        $userdata = auth()->user();

        return view("index", ['cats' => $this->cats, 'articles' => $this->articles, 'userdata' => $userdata, 'alltags' => $this->tags]);

    }

    public function edit(Request $request, $id)
    {
        //Implicit Binding Used
        $article = post::findOrFail($id);
        return view('edit',['cats' => $this->cats,'tags' => $this->tags, 'article' => $article,'alltags' => $this->tags]);
    }

    public function postedit(ArticleValidator $request, post $post)
    {
        $valid_data = $request->validated();
        $post->update($valid_data);
        $post->tags()->sync($valid_data['tags']);
        return redirect('/');
    }

    public function all(Request $request)
    {
        $articles = post::all();

        return view("all", ['cats' => $this->cats, 'articles' => $articles, 'alltags' => $this->tags]);

    }

    public function delete(Request $request, post $post)
    {


        $post->delete();
        return back();

    }


    public function showarticle(Request $request,$id)
    {
        $article = post::findOrFail($id);
        return view("showarticle", ['cats' => $this->cats,'article'=> $article, 'alltags' => $this->tags]);

    }
    public function search(Request $request,$email)
    {

        $data = post::where('email',$email)->get();
        return view('search',['data'=>$data , 'cats' => $this->cats, 'alltags' => $this->tags]);
    }
    public function category(Request $request,$cat)
    {
        $data = Categories::where('name',$cat)->value('id');
        $data = post::where('cat_id', $data)->get();
        return view('search',['data'=>$data , 'cats' => $this->cats, 'alltags' => $this->tags]);
    }
    public function searchtag(Request $request,tag $tag)
    {

        return view('searchbytag',['data'=>$tag->articles()->get() , 'cats' => $this->cats, 'alltags' => $this->tags]);
    }

}
