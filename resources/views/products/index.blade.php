@extends('layouts.app')

@section('main')

    <div class="container">
        <div class="row">
            <a href="products/create" class="btn btn-dark mt-2">New Data</a>
            <table class="table table-striped mt-2">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td><img class="rounded-circle" src="products/{{ $product->image }}" width="50" height="50"></td>
                                <td><a href="products/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                                | <a href="products/{{ $product->id }}/delete" class="btn btn-danger">Delete</a></td>
                            </tr>

                        @endforeach

                    </tbody>
            </table>
        </div>
    </div>


    @endsection
