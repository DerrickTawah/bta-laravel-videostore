@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card col-md-12">
                    <div class="card-header row"><h3 class="my-0 py-0">{{ $data }}</h3></div>
                    <div class="card-body row p-0 justify-content-center">
                        @if( $data->count() > 0)
                        <table class="table">
                            <tr>
                                <th>Titel</th>
                                <th class="d-none d-md-table-cell">€</th>
                                <th class="d-none d-md-table-cell">Jahr</th>
                                <th>&nbsp&nbsp;</th>
                                <th>Order</th>
                            </tr>
                        @foreach($data->movies as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->price }} </td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at->format('Y') }}</td>
                                <td><a class="btn-sm btn-dark" href="{{ route('movie.show', ['movie' => $item->id]) }}">Show</a></td>
                                <td><i class="fas fa-shopping-cart"></i></td>
                            </tr>
                        @endforeach
                            </table>
                        @else
                            <h3>{{ __('Sorry, no data available') }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
