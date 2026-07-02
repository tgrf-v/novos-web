@extends('layouts.internal')

@section('title', 'Chat')

@section('topbar-left')
    <h1 class="text-xl font-bold text-[#1a237e]">Chat Customer</h1>
    <p class="text-sm text-gray-500 mt-0.5">Percakapan dengan customer</p>
@endsection

@section('internal-content')
    @livewire('chat')
@endsection
