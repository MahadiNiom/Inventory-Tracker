@extends('base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create an Item</h1>

    <form action="{{ route('items.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter item name" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Submit</button>
    </form>
</div>
@endsection
