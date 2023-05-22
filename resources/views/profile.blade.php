@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4 shadow-lg">
            <div class=" image d-flex flex-column justify-content-center align-items-center">

                <img class="rounded-circle shadow" src="{{ url('storage/profile-picture.jpg') }}" alt="hafiyyan" height="100px"
                    width="100px">
                <h3 class="mt-3">{{ $user->name }}</h3>
                <p class="mb-3">{{ $user->email }}</p>
                <div class=" d-flex">
                    <form action="{{ route('edit_profile', $user) }}" method="get">
                        @csrf
                        <button class="btn btn-primary btn-sm">Edit Profile</button>
                    </form>
                </div>
                <div class=" px-2 rounded mt-4 date ">
                    <span class="join">Joined May, 2023</span>
                </div>
            </div>
        </div>
    </div>
@endsection
