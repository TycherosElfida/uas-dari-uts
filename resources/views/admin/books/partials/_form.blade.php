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
