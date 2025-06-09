<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Photo Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.photos.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    + Upload New Photo
                </a>
            </div>

            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        @forelse ($photos as $photo)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="w-full h-auto object-cover rounded-md">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white text-xs bg-red-600 hover:bg-red-800 rounded-full p-2">Delete</button>
                                </form>
                            </div>
                            <p class="text-center text-sm mt-1 truncate">{{ $photo->title }}</p>
                        </div>
                        @empty
                        <p class="col-span-full text-center text-gray-500">No photos have been uploaded yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
