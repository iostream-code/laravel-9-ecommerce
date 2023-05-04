@extends('layouts.app')

@section('content')
    <div class="container text-start">
        <div class="row align-items-start">
            <div class="col">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h3>{{ $product->name }}</h3>
                    </li>
                    <li class="list-group-item">
                        <p>{{ $product->description }}</p>
                    </li>
                    <li class="list-group-item">
                        <p>{{ $product->price }}</p>
                    </li>
                    <li class="list-group-item">
                        <p>{{ $product->stock }}</p>
                    </li>
                    <li class="list-group-item">
                        <form action="{{ route('edit_product', $product) }}" method="get">
                            @csrf
                            <button class="btn btn-outline-success" type="submit">
                                Edit
                            </button>
                        </form>
                    </li>
                    <li class="list-group-item">
                        <form action="{{ route('add_to_cart', $product) }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" type="number" name="amount" placeholder="Please enter the amount">
                                <label>Amount</label>
                            </div>

                            <button class="btn btn-outline-primary" type="submit">Add to Cart</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col">
                <img src="{{ url('storage/' . $product->image) }}" alt="" height="500px">
            </div>
        </div>
    </div>
@endsection
