@extends('layout')

<!DOCTYPE html>

@section('content')
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a Terauser
            </h2>
            <p class="mb-4">Edit: {{$terauser->name}}</p>
        </header>

        <form method="POST" action="/Users/{{$terauser->id}}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ $terauser->name }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input value="{{ $terauser->email }}" type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="email" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input value="{{ $terauser->password }}" type="text" class="border border-gray-200 rounded p-2 w-full"
                    name="password" readonly/>
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Submit Edit
                </button>

                <a href="/Users/index" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
@endsection