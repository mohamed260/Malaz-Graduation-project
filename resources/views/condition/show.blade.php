@extends('layouts.app')

@section('content')

<div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
           
            <div class="flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Error</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Counter Number</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Counter Name</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Edit, Show, and Delete</span>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-800 transition-colors duration-200 hover:text-indigo-600">{{ $condition->error }}</div>
                                            </div>
                                        </td>

                                        

                                        <td class="px-3 py-4 text-sm whitespace-nowrap">
                                            <div class="font-medium text-gray-600">{{ $condition->counter->counter_number }}</div>
                                        </td>

                                        <td class="px-3 py-4 text-sm whitespace-nowrap">
                                            <div class="font-medium text-gray-600">{{ $condition->counter->name }}</div>
                                        </td>

                                        <td class="px-3 py-4 text-sm whitespace-nowrap">
                                            <div class="font-medium text-gray-600">
                                                <form action="{{ route('condition.update', $condition->id) }}" method="POST">
                                                    @csrf
                                                    @method('patch')
                                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $condition->completed ? 'checked' : '' }} class=" dark:bg-gray-800">
                                                </form>
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white  dark:bg-gray-800 sm:rounded-lg">
                        <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
                            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Type Report</h2>
            
                            <form action="{{ route('caseDetails.store', $condition->id) }}" method="POST" class="w-full max-w-xl " >
                                @csrf
            
                                <div class="mt-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Notes</label>
                                    
                                    <div class="mt-1">
                                        <textarea name="notes" id="notes" class="block rounded-md w-full mt-1" required autofocus></textarea>
                                    </div>
                                </div>
            
                                <button class="bg-blue-700 px-8 py-2 rounded-md text-white mt-2">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@stop