@php
/** @var \Illuminate\Pagination\LengthAwarePaginator $articles */
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News & Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8">
                @forelse ($articles as $article)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-8">
                    <h3 class="text-2xl font-bold text-gray-900">
                        <a href="{{ route('articles.show', $article->slug) }}" class="hover:text-indigo-600">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <div class="text-sm text-gray-500 mt-2">
                        <span>Posted on {{ $article->created_at->format('F d, Y') }}</span>
                        <span class="mx-2">&bull;</span>
                        <span>by {{ $article->author->name }}</span>
                    </div>
                    <div class="mt-4 text-gray-700">
                        {{ Str::limit($article->content, 200) }}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-indigo-600 font-semibold hover:underline">
                            Read More &rarr;
                        </a>
                    </div>
                </div>
                @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <p class="text-center text-gray-500">No articles have been published yet.</p>
                </div>
                @endforelse

                @if ($articles->hasPages())
                <div class="mt-8">
                    {{ $articles->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
