@extends('layouts.app')

@section('content')

<div class="bg-white px-12 py-20">
    <form action="/role/store" method="POST">
        @csrf
        <div class="">
            <label for="name" class="block text-lg text-gray-500 dark:text-gray-300">New Role</label>
        
            <input type="text" placeholder="Name" name="name" class="block  mt-2 placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
        </div>
        <div>
            <button class="bg-blue-700 px-8 py-2 rounded-md text-white mt-2">Add</button>
        </div>
    </form>
</div>


@stop