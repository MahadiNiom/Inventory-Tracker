@extends('base')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Items</h1>
        <h3>Total :  {{ $items->sum('value') }}</h3>
        <a href="{{ route('items.create') }}" class="btn btn-success">Create an Item</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Value</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->value, 2) }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>
                        <a href="{{ route('item-outs.create', $item->id) }}" class="btn btn-sm btn-danger">Take Out</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
