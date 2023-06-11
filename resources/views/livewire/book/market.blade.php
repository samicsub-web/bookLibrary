<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Books Collection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>Book Market</p>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"> 
                                    Books {{ $books->count() > 0 ? "({$books->count()})" : '' }}
                                </h2>
                                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                                    Choose from the list of cool books you will definitely enjoy
                                </p>
                            </div> 
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
