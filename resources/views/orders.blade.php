@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        @if ($order->is_paid != 0)
                            <td>
                                <a href="{{ url('storage/' . $order->payment_receipt) }}">
                                    <span class="badge text-bg-success">Paid</span>
                                </a>
                            </td>
                        @elseif ($order->is_paid == 0)
                            <td><span class="badge text-bg-danger">unpaid</span></td>
                        @endif
                        <td>
                            <form action="{{ route('detail_order', $order) }}" method="get">
                                @csrf
                                <button class="btn btn-primary mb-2 btn-sm" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                            <form action="" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mb-2 btn-sm" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <form action="{{ route('confirm_payment', $order) }}" method="post">
                                @csrf
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="bi bi-check-circle-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
