@extends('layouts.app')

@section('content')

{{-- <div class="bg-white px-12 py-20">
    <form action="{{ route('sector.update',$sector->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="">
            <label for="name" class="block text-lg text-gray-500 dark:text-gray-300">Edit Role</label>
        
            <input type="text" placeholder="Name" name="name" value="{{ $sector->name }}" class="block  mt-2 placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
            <input type="text" placeholder="Location" name="location" value="{{ $sector->location }}" class="block  mt-2 placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
        </div>
        <div>
            <button class="bg-blue-700 px-8 py-2 rounded-md text-white mt-2">update</button>
        </div>
    </form>
</div> --}}

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Edit <span class="text-gray-500">{{ $sector->name }}</span> Sector</h2>

                <form action="{{ route('sector.update',$sector->id) }}" method="POST" class="w-full max-w-xl " >
                    @csrf
                    @method('patch')

                    <div class="mt-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name <span class="text-red-500 ">*</span></label>
                        
                        <div class="mt-1">
                            <x-text-input value="{{ $sector->name }}" id="name" class="block w-full mt-1" type="text" name="name" required autofocus />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Location <span class="text-red-500 ">*</span></label>
                        
                        <div class="mt-1">
                            <x-text-input value="{{ $sector->location }}" id="name" class="block w-full mt-1" type="text" name="location" required autofocus />
                        </div>
                    </div>

                    <button class="bg-blue-700 px-8 py-2 rounded-md text-white mt-2">update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop