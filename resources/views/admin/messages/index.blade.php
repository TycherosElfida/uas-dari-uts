<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Form Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    @forelse ($messages as $message)
                    <div class="border rounded-lg p-4" x-data="{ open: false }">
                        <div class="flex justify-between items-center cursor-pointer" @click="open = !open">
                            <div>
                                <p class="font-bold">{{ $message->subject }}</p>
                                <p class="text-sm text-gray-600">From: {{ $message->name }} ({{ $message->email }}) on {{ $message->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="flex items-center space-x-4">
                                <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs">Delete</button>
                                </form>
                                <svg class="w-5 h-5 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-4 border-t pt-4" x-show="open" x-cloak>
                            <p>{{ $message->message }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-500">You have no new messages.</p>
                    @endforelse
                </div>
                @if ($messages->hasPages())
                <div class="p-6 border-t">
                    {{ $messages->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
