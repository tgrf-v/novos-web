{{-- Layout Internal --}}
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-base-200">
        @include('components.sidebar')
        @include('components.navbar')
        <main class="p-6">
            @yield('internal-content')
        </main>
        @include('components.footer')
    </div>
@endsection
