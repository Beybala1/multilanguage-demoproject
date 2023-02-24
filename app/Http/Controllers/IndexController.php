<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIndexRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    
    public function index()
    {
        $posts = Post::latest()->get();
        return view('index',get_defined_vars());
    }

    public function create()
    {
        return view('create');
    }

    public function store( StoreIndexRequest $request)
    {
        try {
            $request->validated();
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('success', Lang::get('messages.success'));
        } catch (\Exception $th) {
            return back()->with('error', Lang::get('messages.error'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
