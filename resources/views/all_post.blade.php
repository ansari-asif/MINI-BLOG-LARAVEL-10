
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Post Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-scroll">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if (session()->has('status'))
                        <div class="p-2 bg-green-600 text-white mb-3">
                          {{session('status')}}
                        </div>
                    @endif
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="bg-red-500 uppercase">
                            <tr class="border-gray-100 text-white">
                                <th scope="col" class="px-6 py-3">
                                    Sr.No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Body
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Added BY
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr
                            class="odd:bg-gray-900 even:bg-gray-800 text-white border-b dark:border-gray-700">
                            <th scope="row" class="pl-5">
                                {{ $post->id }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                {{ $post->title }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                {{ $post->body }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                {{ $post->user->name}}
                            </th>
                            <td class="px-6 py-4">                                
                                <button class="bg-blue-700 p-2 rounded-lg shadow-md">
                                  <a href="{{ route('post_edit', ['id'=>$post->id]) }}"
                                    class="font-medium text-white dark:text-blue-500 hover:underline">Edit</a>
                                </button>
                                <button class="bg-red-700 p-2 rounded-lg shadow-md">
                                  <a href="{{ route('post_delete', ['id'=>$post->id]) }}"
                                    class="font-medium text-white dark:text-blue-500 hover:underline">Delete</a>
                                </button>
                                    
                            </td>
                        </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
                

            </div>
        </div>
    </div>
    
    

</x-app-layout>




