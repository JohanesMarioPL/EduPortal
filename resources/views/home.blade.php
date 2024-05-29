@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="bg-gray-200 text-gray-700 py-4 px-6 font-semibold uppercase">
                {{ __('Dashboard') }}
            </div>

            <div class="p-6">
                @auth
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    <p class="text-gray-700">{{ __('You are logged in!') }}</p>
                @else
                    <p class="text-gray-700">{{ __('You need to log in!') }}</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
