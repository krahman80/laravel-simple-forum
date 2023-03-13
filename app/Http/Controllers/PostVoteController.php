<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Vote;

class PostVoteController extends Controller
{
    public function store(Post $post, $vote)
    {
        if (
            !Vote::where('post_id', $post->id)->where('user_id', auth()->id())->count()
            && in_array($vote, [-1, 1])
            && $post->user_id != auth()->id()
        ) {
            // dd($vote);
            Vote::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id,
                'votes' => $vote
            ]);
            $post->increment('votes', $vote);
        }

        return redirect()->back();
    }
}
