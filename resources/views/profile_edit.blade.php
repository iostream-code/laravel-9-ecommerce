@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>
                    <div class="card-body">
                        <form action="{{ route('update_profile', $user) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                            </div>
                            <button class="btn btn-success" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
