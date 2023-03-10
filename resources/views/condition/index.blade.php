@extends('layouts.app')

@section('content')


    

    {{-- @foreach ($conditions as $condition)
    <h1 class="text-2xl">{{ $condition->date }} {{ $condition->counter->address }}</h1>
    
    @endforeach --}}
    <div class="text-lg text-gray-500 pb-4 md:text-2xl">Notifications:</div>

    <div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
            @empty($conditions->count())
                <div class="max-w-md mx-auto">

                    <p class="mt-2 text-2xl font-bold text-center text-gray-600 dark:text-gray-200">No condition Added</p>
                </div>
            @else
                <div class="flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Error</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">date</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Counter Number</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Counter Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Completed</th>
                                        
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Edit, Show, and Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($conditions as $condition)
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0">
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-800 transition-colors duration-200 hover:text-indigo-600">{{ $condition->error }}</div>
                                                </div>
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">{{ $condition->created_at }}</div>
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">{{ $condition->counter->counter_number }}</div>
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">{{ $condition->counter->name }}</div>
                                            </td>
                                            @if($condition->completed == 1)
                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-400">Completed</div>
                                            </td>
                                            @else
                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">Uncomplete</div>
                                            </td>
                                            @endif
                                            
                                            
                                            <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                                                <div class="flex items-center justify-end gap-x-3">
                                                    @if (auth()->user()->role == 'user')   
                                                        <a href="{{ route('condition.show', $condition->id) }}" class="inline-flex items-center text-blue-600 gap-x-1 hover:text-blue-800">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>

                                                            <span>Show</span>
                                                        </a>
                                                    @endif
                                                    
                                                    {{-- <a href="{{ route('condition.edit', $condition->id) }}" class="inline-flex items-center text-indigo-600 gap-x-1 hover:text-indigo-800">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>

                                                        <span>Edit</span>
                                                    </a> --}}
                                                    @if (auth()->user()->role == 'employee')   
                                                        <form method="POST" action="{{ route('condition.destroy', $condition->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <button class="inline-flex items-center text-red-600 gap-x-1 hover:text-red-800 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>

                                                                <span>Delete</span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endempty
        </div>
    </div>

@stop