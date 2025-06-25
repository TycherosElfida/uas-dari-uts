<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photo Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($photos->isNotEmpty())
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($photos as $photo)
                        <div>
                            <a href="{{ asset('storage/app/public/' . $photo->image_path) }}" target="_blank" class="block group">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="w-full h-auto object-cover rounded-lg shadow-md group-hover:shadow-xl transition-shadow">
                            </a>
                            <h3 class="mt-2 font-bold">{{ $photo->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $photo->description }}</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center text-gray-500">There are no photos in the gallery yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>