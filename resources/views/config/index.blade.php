
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Configs
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(count($configs))
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>user</th>
                                        <th>sale target</th>
                                        <th class="text-center">edit</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($configs as $config)
                                        <tr>
                                            <td>{{$config->id}}</td>
                                            <td>{{$config->user->name}}</td>
                                            <td>{{$config->sale_target}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('configs.edit', $config->id) }}"
                                                   class="btn btn-primary btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div>{{ $configs->links() }}</div>
                            </div>
                        @else
                            no configs
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
