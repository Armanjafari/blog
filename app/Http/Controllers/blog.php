<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleValidator;
use App\Mail\MailSender;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use PhpParser\Node\Expr\PostDec;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\queue;

class blog extends Controller
{
    //
    private $cats;
    private $articles;
    private $userdata;
    private $data;

    public function __construct()
    {
        $this->userdata = auth()->user();
        $this->cats = Categories::all();
        $this->articles = post::all();

    }

    public function index(ArticleValidator $request)
    {
        $userdata = auth()->user();
        post::create([
            'text' => request('text'),
            'title' => request('title'),
            'cat_id' => request('cat_id'),
            'email' => $userdata->email

        ]);
        return view("index", ['cats' => $this->cats, 'articles' => $this->articles,'userdata' => $userdata]);
    }

    public function create(Request $request)
    {
        return view("create", ['cats' => $this->cats]);


    }

    public function getindex(Request $request)
    {
        //mail sender
        //$email =  Mail::to('armanjafary1@gmail.com')->send(new MailSender());
        $userdata = auth()->user();

        return view("index", ['cats' => $this->cats, 'articles' => $this->articles, 'userdata' => $userdata]);

    }

    public function edit(Request $request, $id)
    {
        //Implicit Binding Used
        $article = post::findOrFail($id);
        return view('edit',['cats' => $this->cats, 'article' => $article]);
    }

    public function postedit(ArticleValidator $request, post $post)
    {

        post::where('id', $post->id)->update(
            ['text' => request('text'),
                'cat_id' => request('cat_id')]);
        return redirect('/');
    }

    public function all(Request $request)
    {
        $articles = post::all();

        return view("all", ['cats' => $this->cats, 'articles' => $articles]);

    }

    public function delete(Request $request, post $post)
    {


        $post->delete();
        return back();

    }


    public function showarticle(Request $request,$id)
    {
        $article = post::findOrFail($id);
        return view("showarticle", ['cats' => $this->cats,'article'=> $article]);

    }
    public function search(Request $request,$email)
    {
        $data = post::where('email',$email)->get();
        return view('search',['data'=>$data]);
    }
}
