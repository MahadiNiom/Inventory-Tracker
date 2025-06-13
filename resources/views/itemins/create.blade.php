@extends('base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create an Item In</h1>

    <form action="{{ route('item-ins.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="item_id" class="form-label">Item Name</label>
            <select name="item_id" id="item_id" class="form-select" required>
                <option value="" disabled selected>Choose an item</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>
@endsection
