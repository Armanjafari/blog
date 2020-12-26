<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleValidator;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\PostDec;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
class blog extends Controller
{
    //
    private $cats;
    public function __construct()
    {
        $this->cats = Categories::all();

    }

    public function index(ArticleValidator $request)
    {
        post::create([
            'text' => request('text'),
            'cat_id' => request('cat_id')

        ]);
        $cats = Categories::all();
        return view("index", ['cats' => $cats]);
    }

    public function create(Request $request)
    {
        $cats = Categories::all();
        return view("create", ['cats' => $cats]);

    }

    public function getindex(Request $request)
    {
        dd($this->cats);

        $cats = Categories::all();
        return view("index", ['cats' => $cats]);

    }
    public function edit(Request $request , post $post)
    {
        //Implicit Binding Used
        $cats = Categories::all();
        return view('edit',['article' =>$post,'cats' => $cats]);
    }
    public function postedit(ArticleValidator $request , post $post)
    {

        $cats = Categories::all();
        post::where('id',$post->id)->update(
            ['text' => request('text'),
            'cat_id' => request('cat_id')]);
        return redirect('/');
    }
    public function all(Request $request)
    {
        $articles =  post::all();
        $cats =  Categories::all();

        return view("all", ['cats' => $cats, 'articles' => $articles]);

    }
    public function delete(Request $request ,post $post)
    {


        $cats =  Categories::all();
        $post->delete();
        return back();

    }
}
