@extends('base')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Item Ins</h1>
        <a href="{{ route('item-ins.create') }}" class="btn btn-success">Create New Item In</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemIns as $itemIn)
                <tr>
                    <td>{{ $itemIn->id }}</td>
                    <td>{{ $itemIn->item_id }}</td>
                    <td>{{ $itemIn->item->name }}</td>
                    <td>{{ $itemIn->quantity }}</td>
                    <td>{{ number_format($itemIn->price, 2) }}</td>
                    <td>{{ $itemIn->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Example action buttons -->
                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
