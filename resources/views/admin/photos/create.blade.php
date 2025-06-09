<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload New Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
                        @csrf

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
                            <label for="title" class="block font-medium text-sm text-gray-700">Photo Title</label>
                            <input type="text" name="title" id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description (Optional)</label>
                            <textarea name="description" id="description" rows="3" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">Image File</label>
                            <input type="file" name="image" id="image" class="block mt-1 w-full" required>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('admin.photos.index') }}" class="text-sm text-gray-600 underline hover:text-gray-900 mr-4">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Upload Photo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
