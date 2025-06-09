@if ($errors->any())
<div class="mb-4">
    <ul class="list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-4">
    <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
    <input type="text" name="title" id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('title', $article->title ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="content" class="block font-medium text-sm text-gray-700">Content</label>
    <textarea name="content" id="content" rows="10" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('content', $article->content ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="image" class="block font-medium text-sm text-gray-700">Header Image</label>
    <input type="file" name="image" id="image" class="block mt-1 w-full">
    @isset($article)
    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mt-4 h-32 object-cover">
    @endif
    @endisset
</div>

<div class="mb-4">
    <label for="is_published" class="inline-flex items-center">
        <input type="checkbox" name="is_published" id="is_published" class="rounded border-gray-300 text-indigo-600 shadow-sm" value="1" @checked(old('is_published', $article->is_published ?? false))>
        <span class="ms-2 text-sm text-gray-600">Publish Article</span>
    </label>
</div>
