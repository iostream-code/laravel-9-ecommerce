@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td><img src="{{ url('storage/' . $item->image) }}" alt="" height="150px"></td>
                        <td>
                            <form action="{{ route('product', $item) }}" method="get">
                                @csrf
                                <button class="btn btn-primary mb-2" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                            <form action="{{ route('delete_product', $item) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
