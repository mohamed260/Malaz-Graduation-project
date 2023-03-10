@extends('layouts.app')

@section('content')


    {{-- @foreach ($users as $user)
        <h1>{{ $user->name }}</h1>
    @endforeach --}}

    <div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 2xl:p-8 dark:text-gray-100">
            @empty($users->count())
                <div class="max-w-md mx-auto">

                    <p class="mt-2 text-2xl font-bold text-center text-gray-600 dark:text-gray-200">No user Added</p>
                </div>
            @else
                <div class="flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Sector</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>
                                        
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Edit, Show, and Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-0">
                                                    
                                                    
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-800 transition-colors duration-200 hover:text-indigo-600">{{ $user->name }}</div>
                                                    </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">{{ $user->email }}</div>
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">{{ $user->phone }}</div>
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                @if(empty($user->sector->name))
                                                    <form action="{{ route('sector.user.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                            <select class="rounded-lg " onChange="this.form.submit()" name="sector_id" id="name">
                                                                <option class="text-gray-400" value="null">Chooise</option>
                                                                @foreach ($sectors as $sector)
                                                                    
                                                                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                                    {{-- <option value="{{$sector->id}}" @selected($sector->id != $user->sector_id)>{{ $sector->name }}</option> --}}
                                                                                
                                                                @endforeach
                                                            </select>
                                                    </form>
                                                @else
                                                    <form action="{{ route('sector.user.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                            <select class="rounded-lg" onChange="this.form.submit()" name="sector_id" id="name">
                                                                @foreach ($sectors as $sector)
                                                                    
                                                                    <option value="{{$sector->id}}" @selected($sector->id == $user->sector_id) @class(['bg-purple-600 text-white' => $sector->id == $user->sector_id])>{{ $sector->name }}</option>
                                                                    {{-- <option value="{{$sector->id}}">{{ $sector->name }}</option> --}}
                                                                                
                                                                @endforeach
                                                            </select>
                                                    </form>
                                                    
                                                @endif
                                            </td>

                                            <td class="px-3 py-4 text-sm whitespace-nowrap">
                                                <div class="font-medium text-gray-600">
                                                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                            <select class="rounded-lg" onChange="this.form.submit()" name="role" id="role">
                                                                <option value="admin" @selected($user->role == 'admin')>admin</option>
                                                                <option value="employee" @selected($user->role == 'employee')>employee</option>
                                                                <option value="user" @selected($user->role == 'user')>user</option>
                                                            </select>
                                                    </form>
                                                    
                                                </div>
                                            </td>
                                            
                                            <td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-0">
                                                <div class="flex items-center justify-end gap-x-3">
                                                    
                                                    <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <button class="inline-flex items-center text-red-600 gap-x-1 hover:text-red-800 focus:outline-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>

                                                            <span>Delete</span>
                                                        </button>
                                                    </form>
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
    <div class="mt-8">
        {{ $users->links() }}
    </div>

   

@stop