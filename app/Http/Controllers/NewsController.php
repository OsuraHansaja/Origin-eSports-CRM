<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('newsItems'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('news_images', 'public') : null;

        News::create([
            'title' => $request->input('title'),  // Use input() method
            'content' => $request->input('content'),  // Use input() method
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('admin.news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $newsItem->image;
        if ($request->file('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $newsItem->update([
            'title' => $request->input('title'),  // Use input() method
            'content' => $request->input('content'),  // Use input() method
            'image' => $imagePath
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News item updated successfully.');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        if ($newsItem->image) {
            Storage::disk('public')->delete($newsItem->image);
        }
        $newsItem->delete();
        return redirect()->route('admin.news.index')->with('success', 'News item deleted successfully.');
    }
}
