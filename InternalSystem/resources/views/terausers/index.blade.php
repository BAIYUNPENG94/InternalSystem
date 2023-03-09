@extends('layout')

<!DOCTYPE html>

@section('content')
    @include('partials._searchuser')

    <div class="bg-gray-50 border border-gray-200 rounded p-6">

        @unless(count($terausers) == 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Password</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($terausers as $terauser)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $terauser->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">John Doe {{ $terauser->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">john.doe{{ $terauser->password }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <td class="border px-4 py-2"><a href="/Users/{{$terauser->id}}/edit" class="px-4 py-2 font-medium text-white bg-red-500 rounded hover:bg-red-600 focus: outline-none shadow-outline-red active:bg-red-600"> Edit </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No users information found</p>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{ $terausers->links() }}
    </div>

@endsection
