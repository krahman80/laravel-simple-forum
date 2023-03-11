<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CommunityPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Community $community)
    {
        $community->posts()->latest('id')->paginate('10');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Community $community)
    {
        return view('post.create', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, Community $community)
    {

        $post = $community->posts()->create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'post' => $request->post,
            'url' => $request->url,
        ]);

        if ($request->hasFile('image')) {
            $image = Str::lower($request->file('image')->getClientOriginalName());
            $request->file('image')->storeAs('posts/' . $post->id, $image);
            $post->update(['image' => $image]);

            $file = Image::make(storage_path('app/public/posts/' . $post->id . '/' . $image));
            $file->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $image));
        }

        return redirect()->route('communities.show', $community);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postId)
    {
        $post = Post::findOrFail($postId);
        $post->load('comments.user');
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community, Post $post)
    {
        if (Gate::denies('edit-post', $post)) {
            abort(403);
        }

        return view('post.edit', compact('community', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Community $community, Post $post)
    {
        if (Gate::denies('edit-post', $post)) {
            abort(403);
        }

        $post->update($request->validated());

        if ($request->hasFile('image')) {
            $image = Str::lower($request->file('image')->getClientOriginalName());
            $request->file('image')->storeAs('posts/' . $post->id, $image);

            if ($post->image != '' && $post->image != $image) {
                unlink(storage_path('app/public/posts/' . $post->id . '/' . $post->image));
                unlink(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $post->image));
                // if (File::exists(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $post->image))) {
                //     unlink(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $post->image));
                // }
            }

            $post->update(['image' => $image]);

            $file = Image::make(storage_path('app/public/posts/' . $post->id . '/' . $image));
            $file->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $image));
        }

        return redirect()->route('communities.post.show', ['postId' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community, Post $post)
    {

        // if ($post->delete()) {
        //     if (File::exists(storage_path('app/public/posts/' . $post->id . '/' . $post->image))) {
        //         unlink(storage_path('app/public/posts/' . $post->id . '/' . $post->image));
        //     }
        //     if (File::exists(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $post->image))) {
        //         unlink(storage_path('app/public/posts/' . $post->id . '/thumbnail_' . $post->image));
        //     }
        // }

        if (Gate::denies('edit-post', $post)) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('communities.show', [$community])->with('message', 'Post deleted!');
    }
}
