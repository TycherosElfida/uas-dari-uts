<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">

                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                    @else
                    <p class="mb-6 text-gray-600">Have a question or feedback? Fill out the form below to get in touch with us.</p>

                    <form method="POST" action="{{ route('contact.store') }}">
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
                            <label for="name" class="block font-medium text-sm text-gray-700">Your Name</label>
                            <input type="text" name="name" id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Your Email</label>
                            <input type="email" name="email" id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block font-medium text-sm text-gray-700">Subject</label>
                            <input type="text" name="subject" id="subject" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('subject') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block font-medium text-sm text-gray-700">Message</label>
                            <textarea name="message" id="message" rows="5" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>{{ old('message') }}</textarea>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Send Message
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
