<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

    public function ourfilestore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()
            ->route('home')
            ->with('success','Your file successfully uploaded');
    }
    public function editData($id){
         $post = Post::findOrFail($id);
        return view('edit',['ourPost'=> $post]);
    }
    public function updateData($id, Request $request){
    
      $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

    $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()
            ->route('home')
            ->with('success','Your file successfully updated');
    }
    public function deleteData($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()
            ->route('home')
            ->with('success','Your file successfully Deleted');
    }
}
