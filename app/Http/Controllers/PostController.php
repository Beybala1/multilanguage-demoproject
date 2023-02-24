<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStroreRequest;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('post',get_defined_vars());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input('title_' . $locale),
                'content' => $request->input('content_' . $locale),
            ];
        }

        Post::create($data);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $posts = Post::latest()->get();
        $post_find = Post::findOrFail($id);
    
        
        return view('post',get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'title' => $request->input('title_' . $locale),
                'content' => $request->input('content_' . $locale),
            ];
        }

        $post_update = Post::findOrFail($id);
        $post_update->update($data);

        return back();
    }

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return back();
    }
}
