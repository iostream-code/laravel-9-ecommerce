@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Product Cart</h4>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $errors)
                        <p>{{ $errors }}</p>
                    @endforeach
                @endif
                @foreach ($carts as $item)
                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1">
                            <img class="rounded" src="{{ url('storage/' . $item->product->image) }}" width="100">
                        </div>
                        <div class="d-flex flex-column align-items-start product-details">
                            <span class="font-weight-bold">{{ $item->product->name }}</span>
                            <div>
                                <h6 class="text-grey">Rp. {{ $item->product->price }}</h6>
                            </div>
                        </div>
                        <form action="{{ route('update_cart', $item) }}" method="post">
                            @method('patch')
                            @csrf
                            <input type="number" name="amount" value="{{ $item->amount }}">
                            <button class="btn btn-success" type="submit">
                                Save
                            </button>
                        </form>
                        <form action="{{ route('delete_cart', $item) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                    <button class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button>
                    <form action="{{ route('products') }}" method="get">
                        @csrf
                        <button class="btn btn-primary btn-block btn-lg ml-2 pay-button" type="submit">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
