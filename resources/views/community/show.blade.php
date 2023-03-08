@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $community->name }}</h4>
                        <a href="{{ route('communities.post.create', $community) }}"
                            class="btn btn-sm btn-success">create post</a>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ $community->description }}</p>
                    <hr>


                    @forelse ($posts as $post)
                    <div class="d-flex justify-content-between mb-2">
                        <span><a href="{{ route('communities.posts.show', [$post->id]) }}" class="link-secondary">{{
                                $post->title }}</a></span>
                        <span><small class="text-muted">posted by: {{
                                $post->user->username }} | {{ $post->created_at->diffForHumans() }}</small></span>
                    </div>
                    @empty
                    <div>No post found!</div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection