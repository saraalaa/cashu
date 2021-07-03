
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Sales
                    </div>
                    <div class="card-body">
                        @if(count($sales))
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>user</th>
                                        <th>payment</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>{{$sale->id}}</td>
                                            <td>{{$sale->user->name}}</td>
                                            <td>{{$sale->payment}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="">{{ $sales->links() }}</div>
                            </div>
                        @else
                            no sales
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
