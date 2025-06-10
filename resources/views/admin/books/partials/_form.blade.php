{{-- Display any validation errors --}}
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
    <input type="text" name="title" id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        value="{{ old('title', $book->title ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="author" class="block font-medium text-sm text-gray-700">Author</label>
    <input type="text" name="author" id="author" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        value="{{ old('author', $book->author ?? '') }}" required>
</div>

<div class="mb-4">
    <label for="stock" class="block font-medium text-sm text-gray-700">Stock</label>
    <input type="number" name="stock" id="stock" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        value="{{ old('stock', $book->stock ?? '0') }}" required min="0">
</div>

<div class="mb-4">
    <label for="cover_image" class="block font-medium text-sm text-gray-700">Cover Image</label>
    <input type="file" name="cover_image" id="cover_image" class="block mt-1 w-full">
    <p class="text-sm text-gray-500 mt-1">Leave blank to keep the current image.</p>

    {{-- Show the current image if we are editing a book that has one --}}
    @isset($book)
    @if($book->cover_image)
    <div class="mt-4">
        <p class="text-sm font-medium text-gray-700">Current Cover:</p>
        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="mt-2 h-32 w-auto object-contain rounded-md">
    </div>
    @endif
    @endisset
</div>
