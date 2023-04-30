@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Product') }}</div>
                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input class="form-control" type="number" name="price" placeholder="Price">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input class="form-control" type="number" name="stock" placeholder="Stock">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <input class="form-control" type="text" name="description" placeholder="Description">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" placeholder="Image">
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Add New</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
