@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Community') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('communities.update', $community) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                                    value="{{ $community->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $community->message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description')
                                }}</label>

                            <div class="col-md-6">

                                <textarea name="description" id="description" cols="30" rows="3"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    required>{{ $community->description }}</textarea>

                                @error('descrption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="topics" class="col-md-4 col-form-label text-md-end">{{ __('Topic') }}</label>
                            <div class="col-md-6">
                                @foreach ($topics as $topic)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $topic->id }}"
                                        name="topics[]" @if($community->topics->contains($topic->id)) checked @endif
                                    >
                                    <label class="form-check-label">
                                        {{ $topic->name }}
                                    </label>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-secondary">
                                    {{ __('Update Community') }}
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