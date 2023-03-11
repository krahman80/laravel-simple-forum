@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card">
                        <div class="card-header">{{ __('Home') }}</div>

                        <div class="card-body">
                            {{-- content begin here --}}
                            @forelse ($posts as $post)
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
                                <div class="col-11">
                                    <a href="{{ route('communities.post.show', $post->id) }}" class="link-secondary">
                                        <h3>{{ $post->title }}</h3>
                                    </a>
                                    <p>
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">{{
                                                $post->created_at->diffForHumans() }}</span> <span
                                                class="text-muted">ago
                                                by</span> <span class="text-black">{{ $post->user->username }}</span>
                                        </small>
                                    </p>
                                    <p>{{ Illuminate\Support\Str::of($post->post)->words('10', '...') }}</p>
                                    <div class="text-sm op-5">
                                        <small>

                                        </small>
                                        {{-- {{ $post->community->topics}} --}}
                                        @foreach ($post->community->topics as $item)
                                        <a class="text-black mr-2" href="#">#{{ $item->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @empty
                            <div class="row">
                                <div class="col-md-12">No post found</div>
                            </div>
                            <hr>
                            @endforelse
                            <div class="d-flex justify-content-center py-3">
                                {{ $posts->links() }}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">{{ __('New post') }}</div>

                                <div class="card-body">
                                    @forelse ($posts as $post)
                                    <a href="{{ route('communities.post.show', $post->id) }}" class="link-secondary">{{
                                        $post->title }}</a>
                                    <p class="text-sm">
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">{{
                                                $post->created_at->diffForHumans() }}</span> <span
                                                class="text-muted">ago
                                                by</span> <span class="text-black">{{ $post->user->username }}</span>
                                        </small>
                                    </p>
                                    <hr>
                                    @empty
                                    <p>Post not found!</p>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">{{ __('New community') }}</div>

                                <div class="card-body">

                                    @forelse ($communities as $community)
                                    <a href="{{ route('communities.show', $community) }}" class="link-secondary">{{
                                        $community->name }}</a>
                                    <p class="text-sm">
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">{{
                                                $community->created_at->diffForHumans() }}</span> <span
                                                class="text-muted">ago
                                                by</span> <span class="text-black">{{
                                                $community->user->username}}</span>
                                        </small>
                                    </p>
                                    <hr>
                                    @empty
                                    <p>No community found!</p>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection