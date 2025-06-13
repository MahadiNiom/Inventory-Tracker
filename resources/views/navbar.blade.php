<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Inventory App</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items.index') }}">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('item-ins.index') }}">Item Ins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('item-outs.index') }}">Item Outs</a>
                </li>
            </ul>
        </div>
    </div>
</nav>