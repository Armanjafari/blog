<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Categories;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class blog extends Controller
{
    //
    public function index()
    {
        post::create([
            'text' => request('text'),
            'cat' => request('cat')

        ]);
        return view("index");
    }
    public function create()
    {
        return view("create");

    }}
