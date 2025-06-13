@extends('base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Item Outs</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item In ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($itemOuts as $itemOut)
                <tr>
                    <td>{{ $itemOut->id }}</td>
                    <td>{{ $itemOut->itemin->id }}</td>
                    <td>{{ $itemOut->itemin->item->name }}</td>
                    <td>{{ $itemOut->quantity }}</td>
                    <td>{{ number_format($itemOut->price, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($itemOut->date)->format('Y-m-d') }}</td>
                    <td>
                        <!-- Optional: Add buttons here -->
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
