@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products by Category</h1>

    <!-- <div class="form-group">
        <label for="categoryFilter">Filter by Category:</label>
        <select class="form-control" id="categoryFilter">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div> -->

    <form method="GET" action="{{ route('products.index') }}">
        @csrf
        <div class="form-group">
            <label for="minPrice">Minimum Price:</label>
            <input type="number" name="minPrice" id="minPrice" class="form-control" value="{{ request('minPrice') }}">
        </div>
        <div class="form-group">
            <label for="maxPrice">Maximum Price:</label>
            <input type="number" name="maxPrice" id="maxPrice" class="form-control" value="{{ request('maxPrice') }}">
        </div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Categories</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr data-category-ids="{{ implode(',', $product->categories->pluck('id')->toArray()) }}">
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @if ($product->image_path)
                <td><img src="/image/{{ $product->image_path }}" width="100px"></td>
                @else
                No Image
                @endif
                </td>
                <td>
                    @foreach ($product->categories as $category)
                    {{ $category->name }}@if (!$loop->last), @endif
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryFilter = document.getElementById('categoryFilter');
        const productRows = document.querySelectorAll('tbody tr');

        categoryFilter.addEventListener('change', function() {
            const selectedCategoryId = this.value;

            productRows.forEach(function(row) {
                const categoryIds = row.getAttribute('data-category-ids').split(',');
                if (selectedCategoryId === '' || categoryIds.includes(selectedCategoryId)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection