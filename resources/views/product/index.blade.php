@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="text-right">
            <a href="/product/create" class="btn btn-primary my-2 mx-0">Add Product</a>
        </div>
        <table class="table table-default table-bordered-dark">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img class="img-responsive" width="180px" src="products/{{ $product->image }}" alt=""></td>
                        <td>
                            <a class="btn btn-warning" href="/product/edit/{{ $product->id }}">Edit</a>
                            <a class="btn btn-danger" href="/product/delete/{{ $product->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection