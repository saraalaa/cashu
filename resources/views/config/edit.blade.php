
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit
                    <a href="{{ route('users.index') }}" class="btn btn-primary float-right">All Configs</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('configs.update', $config->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">User</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"
                                           name="name" value="{{ $config->user->name }}" required autocomplete="name" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sale_target" class="col-md-4 col-form-label text-md-right">Sale Target</label>

                                <div class="col-md-6">
                                    <input id="sale_target" type="text" class="form-control @error('sale_target') is-invalid @enderror"
                                           name="sale_target" value="{{ $config->sale_target }}" required autocomplete="sale_target">

                                    @error('sale_target')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
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
