@extends('layouts.app')

@section('content')
<div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
        <div class="flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="flex min-w-full divide-y divide-gray-200">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Counter Number</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Address</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Location</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Location Number</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Column Number</th> 
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Street Number</th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-1 py-4 text-left text-sm font-semibold text-gray-900">Phone</th>
                            </tr>
                            <tr>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit, Show, and Delete</span>
                                </th>
                            </tr>
                        <tbody class="bg-white divide-y divide-gray-200">
                        
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-800 transition-colors duration-200 ">{{ $counter->name }}</div>
                                            </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->counter_number }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->address }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->location }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->location_number }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->column_number }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        <div class="font-medium text-gray-600">{{ $counter->street_number }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">{{ $counter->phone }}</td>
                                </tr>
                                <tr>
                                    
                                </tr>
                        </tbody>
                    </table>
                    <form method="POST" action="{{ route('counter.destroy', $counter->id) }}">
                        @csrf
                        @method('delete')
                        
                        <button class="inline-flex items-center bg-red-600 text-white px-8 py-3 rounded-lg my-2 gap-x-1 hover:text-red-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>

                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop