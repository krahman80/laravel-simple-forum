@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between"">
                        <div>{{ __('List Community') }}</div>
                        <div><a href=" {{ route('communities.create') }}" class="btn btn-sm btn-secondary">xxx</a>
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
                {{-- <h4><a href="{{ route('communities.show', $community) }}" class="link-secondary">{{
                        $community->name
                        }}</a></h4>
                <p>{{ $community->description }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('communities.edit', $community) }}" class="btn btn-sm btn-info mx-2">edit</a>
                    <form action="{{ route('communities.destroy', $community) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-warning"
                            onclick="return confirm('are you sure')">delete</button>
                    </form>
                </div>
                <hr> --}}
                <div class="d-flex bd-highlight">
                    <div class="flex-grow-1 bd-highlight">
                        <h4><a href="{{ route('communities.show', $community) }}" class="link-secondary">{{
                                $community->name
                                }}</a></h4>
                    </div>
                    <div><a href="{{ route('communities.edit', $community) }}" class="btn btn-sm btn-info mx-2">xxx</a>
                    </div>
                    <form action="{{ route('communities.destroy', $community) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-warning"
                            onclick="return confirm('Delete this post ?')">xxx</button>
                    </form>
                </div>
                <p>{{\Illuminate\Support\Str::limit($community->description,100)}}</p>
                <hr>
                @empty
                <p>Communities not found</p>
                @endforelse

            </div>
        </div>
    </div>
</div>
</div>
@endsection