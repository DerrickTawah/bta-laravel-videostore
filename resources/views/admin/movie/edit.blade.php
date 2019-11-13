@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-header row"><h3 class="my-0 py-0">@if($data)Edit {{ $data->title }}@else Create @endif </h3></div>
                <div class="card-body row mt-3 p-0 justify-content-center">

                    <form class="col-12" method="POST" action="{{ route('movie.store', ['id' => ($data) ? $data->id : null] ) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="author_id" class="col-md-2 col-form-label">{{ __('Author') }}</label>
                            <div class="col-md-10">
                                <select class="col-md-12" id="author_id" name="author_id" class="form-control @error('author_id') is-invalid @enderror">
                                    <option value="">Please Choose ...</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}"
                                        @if($data && $author->id == $data->author_id) selected @endif>
                                            {{ $author }} </option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('author_id') }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label">{{ __('Title') }}</label>
                            <div class="col-md-10">
                                <input class="col-md-12 px-1" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                       value="@if($data){{ $data->title }}@endif">
                                @error('title')
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label">{{ __('Price') }}</label>
                            <div class="col-md-10">
                                <input class="col-md-12 px-1" id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                       value="@if($data){{ $data->price }}@endif">
                                @error('price')
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 my-3">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
