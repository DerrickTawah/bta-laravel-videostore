@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-header row"><h3 class="my-0 py-0">@if($data)Edit {{ $data->title }}@else Create @endif </h3></div>
                <div class="card-body row mt-3 p-0 justify-content-center">

                    <form class="col-12" method="POST" action="{{ route('admin-movie.store', ['id' => ($data) ? $data->id : null] ) }}">
                        @csrf

                        @include('components.form.fields.select', ['data' => $data, 'name' => 'author_id', 'list' => $authors])
                        @include('components.form.fields.text', ['data' => $data, 'name' => 'title'])
                        @include('components.form.fields.text', ['data' => $data, 'name' => 'price'])

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
