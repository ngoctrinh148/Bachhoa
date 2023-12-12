@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>                            
                            <td>
                                @if ($item->trending == '1')
                                    {{ $item->selling_price }} VND
                                @else
                                    {{ $item->original_price }} VND
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('asset/uploads/products/' . $item->image) }}" class="cate-image"
                                    alt="">
                            </td>
                            <td>
                                <a href="{{ url('edit-products/' . $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a class="btn btn-danger btn-sm"
                                    onclick="return confirmDelete('{{ url('delete-products/' . $item->id) }}')">Delete</a>

                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                    function confirmDelete(deleteUrl) {
                                        swal({
                                                title: "Are you sure?",
                                                text: "Once deleted, you will not be able to recover this products!",
                                                icon: "warning",
                                                buttons: true,
                                                dangerMode: true,
                                            })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    window.location.href = deleteUrl;
                                                } else {
                                                    swal("Your products is safe!");
                                                }
                                            });
                                    }
                                </script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
