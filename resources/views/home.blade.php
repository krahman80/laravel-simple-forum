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
                                    <a href="#" class="link-secondary">
                                        <h3>Post Title</h3>
                                    </a>
                                    <p>
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">2 days
                                                ago</span> <span class="text-muted">ago
                                                by</span> <span class="text-black">kjzde</span>
                                        </small>
                                    </p>
                                    <p>Quickly change the font-size of text. While our heading classes. Quickly change
                                        the font-size of text. While our heading classes </p>
                                    <div class="text-sm op-5">
                                        <small><a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2"
                                                href="#">#AppStrap Theme</a> <a class="text-black mr-2"
                                                href="#">#Wordpress</a></small>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <div>
                                        <a href="#" class="link-secondary text-decoration-none">
                                            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div style="font-size: 20px; font-weight: bold">{{ 2 }}</div>
                                    <div>
                                        <a href="#" class="link-secondary text-decoration-none">
                                            <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <a href="#" class="link-secondary">
                                        <h3>Post Title</h3>
                                    </a>
                                    <p>
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">2 days
                                                ago</span> <span class="text-muted">ago
                                                by</span> <span class="text-black">kjzde</span>
                                        </small>
                                    </p>
                                    <p>Quickly change the font-size of text. While our heading classes </p>
                                    <div class="text-sm op-5"><small> <a class="text-black mr-2"
                                                href="#">#Development</a> <a class="text-black mr-2" href="#">#AppStrap
                                                Theme</a></small></div>
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
                                <div class="card-header">{{ __('New post') }}</div>

                                <div class="card-body">

                                    <a href="#" class="link-secondary">hello wolrd test</a>
                                    <p class="text-sm">
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">2 days
                                                ago</span> <span class="text-muted">ago
                                                by</span> <span class="text-black">kjzde</span>
                                        </small>
                                    </p>
                                    <hr>
                                    <a href="#" class="link-secondary">lorem ipsum</a>
                                    <p class="text-sm">
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">2 days
                                                ago</span> <span class="text-muted">ago
                                                by</span> <span class="text-black">kjzde</span>
                                        </small>
                                    </p>
                                    <hr>
                                    <a href="#" class="link-secondary">lipsum dot amet</a>
                                    <p class="text-sm">
                                        <small>
                                            <span class="text-muted">Posted</span> <span class="text-black">2 days
                                                ago</span> <span class="text-muted">ago
                                                by</span> <span class="text-black">kjzde</span>
                                        </small>
                                    </p>
                                    <hr>
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