<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($article->image)
                {{-- The asset() helper creates the correct URL to your public storage --}}
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover">
                @endif
                <div class="p-6 md:p-8">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $article->title }}</h1>
                    <div class="text-sm text-gray-500 mt-2">
                        <span>Posted on {{ $article->created_at->format('F d, Y') }} by {{ $article->author->name }}</span>
                    </div>

                    <div class="mt-6 prose max-w-none">
                        {{-- Using {!! !!} to render HTML. This is safe ONLY because we trust our admins. --}}
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <div class="mt-8 border-t pt-4">
                        <a href="{{ route('articles.index') }}" class="text-indigo-600 hover:underline">&larr; Back to Articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
