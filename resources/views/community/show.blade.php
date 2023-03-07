@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $community->name }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $community->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection