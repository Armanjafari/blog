<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Categories;
use Illuminate\Support\Facades\App;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;
class blog extends Controller
{
    //
    public function index(Request $request)
    {

        $validator = $request->validate([
            'text' => 'required',
            'cat_id' => 'required'
        ]);


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
        $cats = Categories::all();
        return view("index", ['cats' => $cats]);

    }
    public function edit(Request $request , $id)
    {
        $article = post::findOrFail($id);
        $cats = Categories::all();
        return view('edit',['article' =>$article,'cats' => $cats]);
    }
    public function postedit(Request $request , $id)
    {
        $validator = $request->validate([
            'text' => 'required',
            'cat_id' => 'required'
        ]);
        $cats = Categories::all();
        $article = post::findOrFail($id);
        post::where('id',$id)->update(
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
    public function delete(Request $request ,$id)
    {

        $articles =  post::findOrFail($id);
        $cats =  Categories::all();
        $articles->delete();
        return back();

    }
}
