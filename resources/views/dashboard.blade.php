<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="font-bold text-xl">{{ __("Welcome, ") . auth()->user()->name }}</p>



                    <div class="container my-24 px-6 mx-auto">

                        <!-- Section: Design Block -->
                        <section class="mb-32 text-gray-800 text-center dark:text-whites">
                            <h2 class="text-3xl font-bold mb-20 dark:text-white">Hello, Readers are truly Leaders?</h2>

                            <div class="grid lg:gap-x-12 lg:grid-cols-3">
                            <div class="mb-12 lg:mb-0">
                                <div class="rounded-lg shadow-lg h-full block bg-white">
                                <div class="flex justify-center">
                                    <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
                                    <svg
                                        class="w-7 h-7 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512"
                                    >
                                        <path
                                        fill="currentColor"
                                        d="M488.6 250.2L392 214V105.5c0-15-9.3-28.4-23.4-33.7l-100-37.5c-8.1-3.1-17.1-3.1-25.3 0l-100 37.5c-14.1 5.3-23.4 18.7-23.4 33.7V214l-96.6 36.2C9.3 255.5 0 268.9 0 283.9V394c0 13.6 7.7 26.1 19.9 32.2l100 50c10.1 5.1 22.1 5.1 32.2 0l103.9-52 103.9 52c10.1 5.1 22.1 5.1 32.2 0l100-50c12.2-6.1 19.9-18.6 19.9-32.2V283.9c0-15-9.3-28.4-23.4-33.7zM358 214.8l-85 31.9v-68.2l85-37v73.3zM154 104.1l102-38.2 102 38.2v.6l-102 41.4-102-41.4v-.6zm84 291.1l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6zm240 112l-85 42.5v-79.1l85-38.8v75.4zm0-112l-102 41.4-102-41.4v-.6l102-38.2 102 38.2v.6z"
                                        ></path>
                                    </svg>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-blue-600 mb-4">{{ $user->books->count() }}</h3>
                                    <h5 class="text-lg font-medium mb-4">Books</h5>
                                    <p class="text-gray-500">
                                        Total books in your rent collection
                                    </p>
                                </div>
                                </div>
                            </div>

                            <div class="mb-12 lg:mb-0">
                                <div class="rounded-lg shadow-lg h-full block bg-white">
                                <div class="flex justify-center">
                                    <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
                                    <svg
                                        class="w-7 h-7 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 544 512"
                                    >
                                        <path
                                        fill="currentColor"
                                        d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"
                                        ></path>
                                    </svg>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-blue-600 mb-4">{{ $user->my_requests->count() }}</h3>
                                    <h5 class="text-lg font-medium mb-4">Book Rentage Requests</h5>
                                    <p class="text-gray-500">
                                        Total number of book requests that you have submitted but yet to be reviewed
                                    </p>
                                </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="rounded-lg shadow-lg h-full block bg-white">
                                <div class="flex justify-center">
                                    <div class="p-4 bg-blue-600 rounded-full shadow-lg inline-block -mt-8">
                                    <svg
                                        class="w-7 h-7 text-white"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 512"
                                    >
                                        <path
                                        fill="currentColor"
                                        d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"
                                        />
                                    </svg>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-blue-600 mb-4">{{ $user->books->count() }}</h3>
                                    <h5 class="text-lg font-medium mb-4">Total Books Ever Read and Reading</h5>
                                    <p class="text-gray-500">
                                        This is the total number of books you have ever rented and still on rent
                                    </p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </section>
                        <!-- Section: Design Block -->

                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <section class="bg-white dark:bg-gray-900">
                            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"> 
                                    Latest 5 Books 
                                </h2>

                                <div class="grid gap-8 grid-cols-1">
                                    @forelse ($books as $book)
                                        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                            <div class="flex flex-row gap-3">
                                                <div class="w-1/4 my-auto">
                                                    <img src="{{ asset($book->cover_photo) }}" class="h-75 w-75">
                                                </div>
                                                <div class="w-3/4">
                                                    <div class="flex justify-between items-center mb-5 text-gray-500">
                                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path><path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path></svg>
                                                            {{ $book->category->key }}
                                                        </span>
                                                        <span class="text-sm">{{ $book->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ $book->title }}</a></h2>
                                                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $book->description }}</p>
                                                    <div class="flex justify-end gap-5 items-center dark:text-white">
                                                        
                                                        <p class="mx-2 text-lg font-extrabold ">Price: {{ $book->rent_price == 0 ? 'Free' : "NGN {$book->rent_price}" }}</p>
                                                        {{-- {{ dd($book->reviews->avg('rating')) }} --}}
                                                        <div class="flex items-center">
                                                            <x-reviews :count="$book->reviews->avg('rating') ?? 0"/>
                                                            <p class="sr-only">{{ $book->reviews->avg('rating') ?? 0 }} out of 5 stars</p>
                                                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $book->reviews->count() }} reviews</a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="flex justify-between items-center mt-3">
                                                        <div class="flex items-center space-x-4">
                                                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Green avatar" />
                                                            <span class="font-medium dark:text-white">
                                                                {{ $book->author }}
                                                            </span>
                                                        </div>
                                                        <a href="{{ route('book.show', $book) }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                                            Show Details
                                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article> 
                                    @empty
                                        <div class="col-span-2 text-center lg:mb-16 mb-8 dark:text-white">
                                            No book is available now, please check back later. 
                                        </div>
                                    @endforelse

                                    
                                </div>  
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
