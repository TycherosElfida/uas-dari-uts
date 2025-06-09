@php
/** @var \Illuminate\Pagination\LengthAwarePaginator $books */
@endphp

<x-app-layout>
    {{-- A nice header for the page --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <form action="{{ route('books.index') }}" method="GET" class="flex items-center max-w-lg mx-auto">
                    <input type="text" name="search" placeholder="Search by title or author..." class="w-full rounded-l-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" value="{{ request('search') }}">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-700">Search</button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Grid for the books --}}
                    @if($books->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($books as $book)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">{{ $book->title }}</h3>
                                <p class="text-sm text-gray-600 mt-1">by {{ $book->author }}</p>
                                <p class="text-sm text-gray-500 mt-2">Stock: {{ $book->stock }}</p>
                            </div>
                            <a href="{{ route('books.show', $book) }}" class="mt-4 inline-block bg-green-600 text-white text-center font-bold py-2 px-4 rounded-md hover:bg-green-700 transition">
                                Details & Borrow
                            </a>
                        </div>
                        @endforeach
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-8">
                        {{ $books->links() }}
                    </div>
                    @else
                    <p class="text-center text-gray-500">No books found matching your search criteria.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
