@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">@lang('Authors')</div>
                    <div class="card-body row p-0 justify-content-center">
                        @if($data->count() > 0 )
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>Filme</th>
                                    <th>&nbsp&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item }}</td>
                                    <td>{{ $item->movies->count() }}</td>
                                    <td><a class="btn-sm btn-dark" href="{{ route('author.show', ['author' => $item->id]) }}">Show</a></td>
                                </tr>
                            @endforeach
                            </table>
                        @else
                           <h3>Keine Daten vorhanden!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
