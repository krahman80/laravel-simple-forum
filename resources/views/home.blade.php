@extends('layouts.app')

@section('content')

<div class="col-md-12 mb-3">
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
                                $post->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                                by</span> <span class="text-black">{{ $post->user->username }}</span>
                        </small>
                    </p>
                    <p>{{ Illuminate\Support\Str::of($post->post)->words('10', '...') }}</p>
                    <div class="text-sm op-5">
                        <small>
                            @foreach ($post->community->topics as $item)
                            <a class="text-black mr-2" href="#">#{{ $item->name }}</a>
                            @endforeach
                        </small>
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