@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Product') }}</div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input class="form-control" type="text" name="description"
                                    value="{{ $product->description }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input class="form-control" type="number" name="price" value="{{ $product->price }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input class="form-control" type="number" name="stock" value="{{ $product->stock }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" value="{{ $product->imaeg }}">
                            </div>

                            <button class="btn btn-outline-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
