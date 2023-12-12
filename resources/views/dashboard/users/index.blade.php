@extends('dashboard.layouts.app')
@section('header')
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'users' }}
        </h2>
        {{-- <a href="{{ route('users.create') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md"><i
                class="fas fa-solid fa-plus"></i> ADD</a> --}}
    </div>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <table data-theme="light" id="userTable" class="display min-w-full divide-y divide-gray-200"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                {{-- <th>Description</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->phone }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->role }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="border border-yellow-500 hover:bg-yellow-500 text-yellow-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- add delete button using form tag --}}
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                            id="delete-user{{ $user->id }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <a onclick="Swal.fire({
                                                  title: 'Confirm Delete',
                                                  text: 'Are you sure you want to delete user {{ $user->title }}?',
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonText: 'Yes, delete it',
                                                  cancelButtonText: 'Cancel'
                                              }).then((result) => {
                                                  if (result.isConfirmed) {
                                                      document.getElementById('delete-user{{ $user->id }}').submit();
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
            // $("#userTable").DataTable({
            //     // responsive: true,
            // });
            // new DataTable('#userTable', {
            //     responsive: false,
            // });
            new DataTable('#userTable', {
                responsive: false,
                darkMode: false,
            });
        </script>
    </div>
@endsection
