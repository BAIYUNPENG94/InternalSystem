@extends('layout')

<!DOCTYPE html>

@section('content')
    @include('partials._hero')
    @include('partials._search')

    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <a href="/Upload/index" class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded">Email Tool</a>
        <a href="/Users/index" class="py-2 px-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded">User Management</a>
    </div>
@endsection
