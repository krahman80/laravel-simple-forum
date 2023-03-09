@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <span class="badge bg-secondary">C</span>
                        {{ $community->name }}
                    </h4>
                </div>
                <div class="card-body">
                    <p>{{ $community->description }}</p>
                    <hr>

                    <div class="d-flex justify-content-end">
                        <p><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;&nbsp;
                            <a href="{{ route('communities.post.create', $community) }}" class="text-dark">
                                Add post
                            </a>
                        </p>

                    </div>
                    <br>
                    @forelse ($posts as $post)
                    <div class="py-3">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-sm-0">
                                <h5><a href="{{ route('communities.posts.show', [$post->id]) }}" class="link-dark">{{
                                        $post->title }}</a></h5>
                                <p><small>
                                        <span class="text-muted">Posted</span> <span class="text-black">{{
                                            $post->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                                            by</span> <span class="text-black">{{ $post->user->username }}</span>

                                    </small>
                                </p>
                                <div class="text-sm op-5"><small><a class="text-dark mr-2" href="#">#Development</a> <a
                                            class="text-dark mr-2" href="#">#AppStrap Theme</a></small></div>
                            </div>
                            <div class="col-md-4 op-7">
                                <div class="row text-center op-7">
                                    <div class="col px-1"> <i class="fa fa-signal" aria-hidden="true"></i>
                                        <span class="d-block text-sm">256 Votes</span>
                                    </div>
                                    <div class="col px-1"> <i class="fa fa-comment" aria-hidden="true"></i>
                                        <span class="d-block text-sm">251 Replys</span>
                                    </div>
                                    <div class="col px-1"> <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span class="d-block text-sm">223 Views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: dashed 1px;" />
                    @empty
                    <div>No post found!</div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection