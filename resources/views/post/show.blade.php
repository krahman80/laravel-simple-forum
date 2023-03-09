@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5><span class="badge bg-secondary">P</span>&nbsp;&nbsp;Post</h5>
                </div>
                <div class="card-body">

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
                            <h3>{{ $post->title }}</h3>
                            <p><small>
                                    <span class="text-muted">Posted</span> <span class="text-black">{{
                                        $post->created_at->diffForHumans() }}</span> <span class="text-muted">ago
                                        by</span> <span class="text-black">{{ $post->user->username }}</span>

                                </small>
                            </p>
                            <p>{{ $post->post }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <p>
                            <i class="fa fa-comments-o" aria-hidden="true">&nbsp;&nbsp;</i><a href="#"
                                class="text-secondary">Reply</a>
                        </p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-11">
                            <p><small>
                                    <span class="text-muted">Posted</span> <span class="text-black">2 minutes ago</span>
                                    <span class="text-muted">ago
                                        by</span> <span class="text-black">xxxx</span>

                                </small>
                            </p>
                            <div class="border-start ps-2">
                                <p>Lorem
                                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer
                                    took a
                                    galley of type and scrambled it to make a type specimen book. It has survived not
                                    only</p>
                                <p>likes | share</p>
                            </div>

                            {{--
                            <hr style="border-top: dashed 1px;"> --}}
                        </div>
                    </div>

                    <div class="row  mb-4">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-11">
                            <p><small>
                                    <span class="text-muted">Posted</span> <span class="text-black">2 minutes ago</span>
                                    <span class="text-muted">ago
                                        by</span> <span class="text-black">xxxx</span>

                                </small>
                            </p>
                            <div class="border-start ps-2">
                                <p>Lorem
                                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer
                                </p>
                                <p>likes | share</p>
                            </div>

                            {{--
                            <hr style="border-top: dashed 1px;"> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection