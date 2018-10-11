@include('layouts.app')


<a class="btn btn-small btn-success" href="{{ URL::to('admin/products/create') }}">Create</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Slug</td>
            <td>Price</td>
            <td>Category</td>
            <td>Created At</td>
            <td>Updated At</td>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('admin/products/' . $product->id) }}">Show this Nerd</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('admin/products/edit/' . $product->id) }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
