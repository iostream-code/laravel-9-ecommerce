@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($product as $item)
            <h3>Name : {{ $item->name }}</h3>
            <img src="{{ url('storage/' . $item->image) }}" alt="" height="100px">
            <form action="{{ route('product', $product) }}" method="get">
                <button type="submit">
                    Show Detail
                </button>
            </form>
        @endforeach
    </div>
@endsection
