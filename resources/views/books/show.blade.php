<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 grid grid-cols-1 md:grid-cols-3 gap-8">

                    {{-- Column 1: Book Cover Image --}}
                    <div class="md:col-span-1">
                        <img class="w-full h-auto rounded-lg shadow-md object-cover"
                            src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://via.placeholder.com/400x600.png/003344?text=No+Cover' }}"
                            alt="Cover of {{ $book->title }}">
                    </div>

                    {{-- Column 2: Book Details and Actions --}}
                    <div class="md:col-span-2">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $book->title }}</h1>
                        <p class="text-lg text-gray-600 mt-2">by <span class="font-semibold">{{ $book->author }}</span></p>

                        <p class="text-lg text-gray-900 mt-6">Synopsis</p>

                        <div class="mt-2 prose prose-sm max-w-none text-gray-700">
                            @if($book->synopsis)
                            <p>{{ $book->synopsis }}</p>
                            @else
                            <p>No synopsis available for this book.</p>
                            @endif
                        </div>

                        <div class="mt-6 border-t border-gray-200 pt-6">
                            <p class="text-lg font-medium"><strong>Available Stock:</strong> {{ $book->stock }}</p>
                        </div>

                        {{-- Action Button Logic --}}
                        <div class="mt-8">
                            @if ($book->stock < 1)
                                <p class="inline-block bg-gray-300 text-gray-700 font-bold py-3 px-6 rounded-md cursor-not-allowed">Out of Stock</p>
                                @else
                                {{-- Show borrow button only to logged-in users --}}
                                @auth
                                <form method="POST" action="{{ route('loans.store') }}">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 transition">
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

                        <div class="mt-10 border-t pt-6">
                            <a href="{{ route('books.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to Book List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
