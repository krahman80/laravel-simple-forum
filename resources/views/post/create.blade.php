@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>{{ $community->name }}</span>
                        <span class="text-success">{{ __('Create Post') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('communities.post.store', $community) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text"
                                    class="form-control form-control-sm @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="post" class="col-md-4 col-form-label text-md-end">{{ __('Post')
                                }}</label>

                            <div class="col-md-6">

                                <textarea name="post" id="post" cols="30" rows="5"
                                    class="form-control form-control-sm @error('post') is-invalid @enderror">{{ old('post') }}</textarea>

                                @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Url') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="text"
                                    class="form-control form-control-sm @error('url') is-invalid @enderror" name="url"
                                    value="{{ old('url') }}" autocomplete="url">

                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="topics" class="col-md-4 col-form-label text-md-end">{{ __('Topic') }}</label>
                            <div class="col-md-6">
                                @foreach ($topics as $topic)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $topic->id }}"
                                        name="topics[]">
                                    <label class="form-check-label">
                                        {{ $topic->name }}
                                    </label>
                                </div>
                                @endforeach

                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    {{ __('Create Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection