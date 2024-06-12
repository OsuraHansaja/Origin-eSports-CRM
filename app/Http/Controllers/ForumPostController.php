<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostController extends Controller
{
    public function index()
    {
        $posts = ForumPost::where('user_id', Auth::id())->get();
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        ForumPost::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('forum.index');
    }

    public function edit($id)
    {
        $forumPost = ForumPost::findOrFail($id);
        return view('forum.edit', compact('forumPost'));
    }

    public function update(Request $request, $id)
    {
        $forumPost = ForumPost::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $forumPost->update($request->all());

        return redirect()->route('forum.index');
    }

    public function destroy($id)
    {
        $forumPost = ForumPost::findOrFail($id);
        $forumPost->delete();
        return redirect()->route('forum.index');
    }
}

