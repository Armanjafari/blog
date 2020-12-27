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
        return view("index", ['cats' => $this->cats]);
    }

    public function create(Request $request)
    {
        return view("create", ['cats' => $this->cats]);

    }

    public function getindex(Request $request)
    {

        return view("index", ['cats' => $this->cats]);

    }
    public function edit(Request $request , post $post)
    {
        //Implicit Binding Used
        return view('edit',['article' =>$post,'cats' => $this->cats]);
    }
    public function postedit(ArticleValidator $request , post $post)
    {

        post::where('id',$post->id)->update(
            ['text' => request('text'),
            'cat_id' => request('cat_id')]);
        return redirect('/');
    }
    public function all(Request $request)
    {
        $articles =  post::all();

        return view("all", ['cats' => $this->cats, 'articles' => $articles]);

    }
    public function delete(Request $request ,post $post)
    {


        $post->delete();
        return back();

    }
}
