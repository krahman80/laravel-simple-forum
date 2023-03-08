@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Home') }}</div>

                        <div class="card-body">
                            {{-- content begin here --}}
                            <div class="row">
                                <div class="col-1 text-center">
                                    <div>
                                        <a href="#"><i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i></a>
                                    </div>
                                    <div style="font-size: 20px; font-weight: bold">{{ 3 }}</div>
                                    <div>
                                        <a href="#"><i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <a href="#" class="link-secondary">
                                        <h3>Post Title</h3>
                                    </a>
                                    <p>1 day ago</p>
                                    <p>Quickly change the font-size of text. While our heading classes </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <div>
                                        <a href="#"><i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i></a>
                                    </div>
                                    <div style="font-size: 20px; font-weight: bold">{{ 2 }}</div>
                                    <div>
                                        <a href="#"><i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <a href="#" class="link-secondary">
                                        <h3>Post Title</h3>
                                    </a>
                                    <p>1 day ago</p>
                                    <p>Quickly change the font-size of text. While our heading classes </p>
                                </div>
                            </div>
                            {{-- content end here --}}
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">{{ __('new post') }}</div>

                                <div class="card-body">

                                    <div><a class="link-secondary text-decoration-none" href="#">A second item</a>
                                        <small>1 day ago</small>
                                    </div>
                                    <hr class="m-0 p-0">
                                    <a class="link-secondary" href="#">A third item</a>
                                    <div class="my-0" style="font-size: 0.8rem;"><small>1 day ago</small></div>
                                    <hr>
                                    <a class="link-secondary" href="#">A forth item</a>
                                    <div><small>1 day ago</small></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">{{ __('New community') }}</div>

                                <div class="card-body">

                                    @forelse ($community as $community)
                                    <a href="{{ route('communities.show', $community) }}" class="link-secondary">{{
                                        $community->name }}</a>
                                    <div><small>{{ $community->created_at->diffForHumans() }}</small>
                                    </div>
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