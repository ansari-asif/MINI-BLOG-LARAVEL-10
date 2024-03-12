<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('post_update', ['id'=>$post->id]) }}">
                        @csrf
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full p-3 border-blue-600" type="text" name="title"
                                :value="$post->title" required autofocus autocomplete="Enter Title" placeholder="Enter Title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mt-3">
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-input id="body" class="block mt-1 w-full p-2 h-30 focus:border-blue-600" type="text" name="body"
                                :value="$post->body" required autofocus autocomplete="Enter body" placeholder="Enter body" />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                        



                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Update Post') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
