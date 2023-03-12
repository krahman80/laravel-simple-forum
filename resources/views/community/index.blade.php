@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h4>{{ __('List of My Community') }}</h4>
            <div>
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;&nbsp;
                <a href="{{ route('communities.create') }}" class="text-dark">
                    Add community
                </a>
            </div>
        </div>
    </div>

    <div class="card-body my-3">

        @if (session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
        @endif

        @forelse ($communities as $community)
        <div class="row align-items-center">
            <div class="col-md-8 mb-3 mb-sm-0">
                <h4><a href="{{ route('communities.show', $community) }}" class="link-secondary">{{
                        $community->name
                        }}</a></h4>
                <p><small>
                        <span class="text-muted">Posted</span> <span class="text-black">{{
                            $community->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                            by</span> <span class="text-black">{{ $community->user->username }}</span>

                    </small>
                </p>
                <div class="text-sm op-5">
                    <p>{{\Illuminate\Support\Str::limit($community->description,100)}}</p>
                </div>
            </div>
            <div class="col-md-4 op-7">
                <div class="d-flex justify-content-end">
                    <div class="row gx-2 text-center">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <a href="{{ route('communities.edit', $community) }}" class="text-dark">
                            edit
                        </a>
                    </div>
                    <form class="row gx-2 text-center" action="{{ route('communities.destroy', $community) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        <button type="submit" class="btn btn-link text-dark"
                            onclick="return confirm('Delete this post ?')">
                            delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <hr style="border-top: dashed 1px;" />
        @empty
        <p>Communities not found</p>
        @endforelse

    </div>
</div>

@endsection