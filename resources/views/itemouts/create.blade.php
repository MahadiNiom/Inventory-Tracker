@extends('base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Take Out Items</h1>

    <form action="{{ route('item-outs.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="item_in_id" class="form-label">Item Info</label>
            <select name="item_in_id" id="item_id" class="form-select" required>
                <option value="" disabled selected>Select an item</option>
                @foreach($itemins as $item)
                    <option value="{{ $item->id }}">
                        TK: {{ $item->price }} | Quantity: {{ $item->quantity }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-danger w-100">Take Out</button>
    </form>
</div>
@endsection
