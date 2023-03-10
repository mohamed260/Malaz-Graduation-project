@extends('layouts.app')

@section('content')

<a href="/role/create" class="text-4xl">New Role</a>

@foreach ($roles as $role)

    <h1 class="text-2xl">{{ $role->name }}</h1>
    <a href="{{ route('role.edit',$role->id) }}">Edit</a>
    <form action="{{ route('role.destroy',$role->id) }}" method="POST">
        @csrf
        @method('delete')
        <button>Delete</button>
    </form>

@endforeach





@stop