@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">New caseDetails</h2>

                <form action="{{ route('caseDetails.store') }}" method="POST" class="w-full max-w-xl " >
                    @csrf

                    <div class="mt-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Date</span></label>
                        
                        <div class="mt-1">
                            <x-text-input id="name" class="block w-full mt-1" type="date" name="date" required autofocus />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Notes</label>
                        
                        <div class="mt-1">
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="notes" required autofocus />
                        </div>
                    </div>

                    <button class="bg-blue-700 px-8 py-2 rounded-md text-white mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop