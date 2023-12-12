@extends('dashboard.layouts.app')
@section('header')
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'products' }}
        </h2>
        <a href="{{ route('products.create') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md"><i
                class="fas fa-solid fa-plus"></i> ADD</a>
    </div>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <table data-theme="light" id="productTable" class="display min-w-full divide-y divide-gray-200"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                {{-- <th>Description</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $product->title }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $product->category }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">Rp{{ number_format($product->price, 0) }}
                                    </td>
                                    {{-- <td class="px-6 py-4 whitespace-no-wrap"><img class="h-16"
                                        src="{{ Storage::url($product->image) }}" alt="{{ $product->title }}"
                                        srcset=""></td> --}}
                                    {{-- <td class="px-6 py-4 whitespace-no-wrap">{{ $product->description }}</td> --}}
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('products.show', $product->id) }}"
                                            class="border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="border border-yellow-500 hover:bg-yellow-500 text-yellow-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- add delete button using form tag --}}
                                        <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                            id="delete-product{{ $product->id }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <a onclick="Swal.fire({
                                                  title: 'Confirm Delete',
                                                  text: 'Are you sure you want to delete product {{ $product->title }}?',
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonText: 'Yes, delete it',
                                                  cancelButtonText: 'Cancel'
                                              }).then((result) => {
                                                  if (result.isConfirmed) {
                                                      document.getElementById('delete-product{{ $product->id }}').submit();
                                                  }
                                              });"
                                                class="border border-red-500 hover:bg-red-500 text-red-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <script>
            // $("#productTable").DataTable({
            //     // responsive: true,
            // });
            // new DataTable('#productTable', {
            //     responsive: false,
            // });
            new DataTable('#productTable', {
                responsive: false,
                darkMode: false,
            });
        </script>
    </div>
@endsection
