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
use Laravel\Socialite\Facades\Socialite;
use MongoDB\Driver\Session;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class blog extends Controller
{
    //
    private $cats;
    private $articles;
    private $userdata;
    private $data;
    private $tags;
    private $activecode;
    public function __construct()
    {
        $this->userdata = auth()->user();
        $this->cats = Categories::all();
        $this->articles = post::all();
        $this->tags = tag::all();
        $this->activecode = rand(1000,9999);

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
        return view("index", [ 'articles' => $this->articles]);
    }

    public function create(Request $request)
    {
        return view("create", ['cats' => $this->cats,'alltags' => $this->tags]);


    }

    public function getindex(Request $request)
    {

        $userdata = auth()->user();

        return view("index", [ 'articles' => $this->articles, 'userdata' => $userdata]);

    }

    public function edit(Request $request, $id)
    {
        //Implicit Binding Used
        $article = post::findOrFail($id);
        return view('edit',['tags' => $this->tags, 'article' => $article, 'cats' => $this->cats]);
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

        return view("all", [ 'articles' => $articles]);

    }

    public function delete(Request $request, post $post)
    {


        $post->delete();
        return back();

    }


    public function showarticle(Request $request,$id)
    {
        $article = post::findOrFail($id);
        return view("showarticle", ['article'=> $article]);

    }
    public function search(Request $request,$email)
    {

        $data = post::where('email',$email)->get();
        return view('search',['data'=>$data ]);
    }
    public function category(Request $request,$cat)
    {
        $data = Categories::where('name',$cat)->value('id');
        $data = post::where('cat_id', $data)->get();
        return view('search',['data'=>$data ]);
    }
    public function searchtag(Request $request,tag $tag)
    {

        return view('searchbytag',['data'=>$tag->articles()->get() ]);
    }
    public function code(Request $request)
    {
        $username = "09170883288";
        $password = '2282065166';
        $from = "+983000505";
        $pattern_code = "avolm8i3rb";
        $to = array("9014627125");
        $input_data = array("OTP" => "$this->activecode");
        $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);

        return view('code');
    }
    public function loginwithcode()
    {
        return view("loginwithcode");
    }
    public function verifycode(Request $request)
    {
        $code = $request->input('code');
        $email = $request->input('email');
        dd($this->activecode);
        if ($code == $this->activecode)
        {
            $user = User::where('email',$email)->first();
            if ($user!= null){
                auth()->loginUsingId($user->id);
            }

            return redirect("/");
        }
        return view("loginwithcode");
    }


}
