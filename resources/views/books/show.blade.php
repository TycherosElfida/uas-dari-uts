<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <h3 class="text-2xl font-bold">{{ $book->title }}</h3>
                    <p class="text-md text-gray-600 mt-1">by <span class="font-semibold">{{ $book->author }}</span></p>

                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <p class="text-lg"><strong>Available Stock:</strong> {{ $book->stock }}</p>
                    </div>

                    {{-- Action Button Logic --}}
                    <div class="mt-8">
                        @if ($book->stock < 1)
                            <p class="inline-block bg-gray-300 text-gray-600 font-bold py-2 px-4 rounded-md">Out of Stock</p>
                            @else
                            {{-- Show borrow button only to logged-in users --}}
                            @auth
                            <form method="POST" action="{{ route('loans.store') }}"> {{-- We will add the action route in the next step --}}
                                @csrf {{-- CSRF Protection Token --}}
                                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-4 rounded-md hover:bg-green-700 transition">
                                    Borrow This Book
                                </button>
                            </form>
                            @endauth

                            {{-- Show login prompt to guests --}}
                            @guest
                            <div class="p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-md">
                                Please <a href="{{ route('login') }}" class="font-bold underline">log in</a> or <a href="{{ route('register') }}" class="font-bold underline">register</a> to borrow this book.
                            </div>
                            @endguest
                            @endif
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('books.index') }}" class="text-indigo-600 hover:underline">&larr; Back to Book List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
