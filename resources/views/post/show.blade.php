@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge bg-secondary">P</span>&nbsp;&nbsp;Post</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-1 text-center">
                            <div>
                                <a href="#" class="link-secondary text-decoration-none">
                                    <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div style="font-size: 20px; font-weight: bold">{{ 3 }}</div>
                            <div>
                                <a href="#" class="link-secondary text-decoration-none">
                                    <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-11 mb-3">
                            <h3>{{ $post->title }}</h3>
                            <p><small>
                                    <span class="text-muted">Posted</span> <span class="text-black">{{
                                        $post->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                                        by</span> <span class="text-black">{{ $post->user->username }}</span>

                                </small>
                            </p>
                            @if ($post->url != '')
                            <div class="mb-2">
                                <a href="{{ $post->url }}" target="_blank" rel="noopener noreferrer">{{ $post->url
                                    }}</a>
                            </div>
                            @endif
                            @if ($post->image != '')
                            <div class="mb-2">
                                <img src="{{ asset('storage/posts/'. $post->id . '/thumbnail_' . $post->image) }}"
                                    alt="{{ $post->image }}">
                            </div>
                            @endif
                            <p>{{ $post->post }}</p>

                            @auth
                            @can('edit-post', $post)
                            <div class="d-flex justify-content-start">
                                <div class="me-3">
                                    <a href="{{ route('communities.post.edit', [$post->community, $post]) }}"
                                        class="ps-0 btn btn-link text-dark">Edit</a>
                                </div>
                                <form action="{{ route('communities.post.destroy', [$post->community, $post]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ps-0 btn btn-link text-dark"
                                        onclick="return confirm('Delete this post ?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;delete
                                    </button>
                                </form>
                            </div>
                            @endcan
                            @endauth
                            <hr>
                        </div>

                    </div>

                    <div class="row justify-content-end mb-4">
                        <form class="col-md-11" method="POST" action="{{ route('posts.comment.store', $post) }}">
                            @csrf
                            <div class="mb-3">
                                <textarea class="form-control" name="comment_text" rows="3"
                                    placeholder="what are your thoughts?" required></textarea>
                            </div>
                            {{-- <i class="fa fa-comments-o" aria-hidden="true">&nbsp;&nbsp;</i><a href="#"
                                class="text-secondary">Reply</a> --}}
                            <div class="d-flex justify-content-end">
                                @auth
                                <button type="submit" class="btn btn-sm btn-secondary">Comments</button>
                                @endauth
                                @guest
                                <div class="text-muted">sign in to comment</div>
                                @endguest
                            </div>

                        </form>
                    </div>

                    @forelse ($post->comments as $comment)
                    <div class="row mb-3">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-11">
                            <p><small>
                                    <span class="text-muted">Posted</span> <span class="text-black">{{
                                        $comment->created_at->diffForHumans() }}</span>
                                    <span class="text-muted">ago
                                        by</span> <span class="text-black">{{
                                        $comment->user->username }}</span>

                                </small>
                            </p>
                            <div class="border-start ps-4">
                                <p>{{ $comment->comment_text }}</p>
                                <p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                    <a href="#">likes</a> | <i class="fa fa-share" aria-hidden="true"></i>
                                    <a href="">share</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="row mb-3">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-11">
                            <p>No comments yet...</p>
                        </div>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection