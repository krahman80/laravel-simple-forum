@extends('layouts.app')

@section('content')

<div class="col-md-12 mb-3">
    @if( Auth::check() && !Auth::user()->email_verified_at )
    <div class="card mb-4">
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

        <div class="card-body">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span class="fw-bold">{{ __('Post') }}</span>
                <span class="text-muted">Sort by:
                    <a href="{{ route('/')}}" class="text-dark" @if (request('sort', '' )=='' ) style="font-weight: 600"
                        @endif>newest</a>
                    |
                    <a href="{{ route('/') }}?sort=votes" class="text-dark" @if (request('sort', '' )=='votes' )
                        style="font-weight:600" @endif>votes</a>
                </span>
            </div>

        </div>

        <div class="card-body">
            {{-- content begin here --}}
            @forelse ($posts as $post)
            <div class="row">
                <div class="col-1 text-center">
                    <div>
                        <a href="{{ route('post.vote.store', [$post, 1])}}" class="link-secondary text-decoration-none">
                            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div style="font-size: 20px; font-weight: bold">{{ $post->votes }}</div>
                    <div>
                        <a href="{{ route('post.vote.store', [$post, -1])}}"
                            class="link-secondary text-decoration-none">
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
                                $post->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                                by</span> <span class="text-black">{{ $post->user->username }}</span>
                        </small>
                    </p>
                    <p>{{ Illuminate\Support\Str::of($post->post)->words('10', '...') }}</p>
                    <div class="text-sm op-5">
                        {{-- <small>
                            @foreach ($post->community->topics as $item)
                            <a class="text-black mr-2" href="#">#{{ $item->name }}</a>
                            @endforeach
                        </small> --}}
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

@endsection