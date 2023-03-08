@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    List of post
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Community') }}</div>

                <div class="card-body">
                    @forelse ($community as $community)
                    <li class="list-group-item"><a href="{{ route('communities.show', $community) }}"
                            class="link-secondary">{{ $community->name }}</a></li>

                    @empty
                    <li class="list-group-item">No community found!</li>
                    @endforelse
                    <ul class="list-group">
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection