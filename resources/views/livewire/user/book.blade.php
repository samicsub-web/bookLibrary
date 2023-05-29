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
                    <p>Book List here</p>

                    <x-link-button :link="route('book.market')">
                        {{ __('Find New Book') }}
                    </x-link-button>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                                <h3 class="mb-4 text-xl lg:text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white"> 
                                    Ever Read Books {{ $books->books->count() }} / Currently Borrowed {{ $books->rented_books->count()}}
                                </h3>
                                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                                    The listing of all purchased books which are still within the rentage period
                                </p>
                            </div> 
                            <div class="grid gap-8 lg:grid-cols-2">
                                @forelse ($books->rented_books as $book)
                                 
                                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex justify-between items-center mb-5 text-gray-500">
                                        <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                                            {{ $book->category->key }}
                                        </span>
                                        <span class="text-sm" title="Returning Time">Rent Expires: {{ \Carbon\Carbon::parse($book->pivot->return_date)->diffForHumans() }}</span>
                                    </div>
                                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="{{ route('book.show', $book) }}">{{ $book->title }}</a></h2>
                                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                        {{ $book->description }}
                                    </p>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center space-x-4">
                                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                                            <span class="font-medium dark:text-white">
                                                {{ $book->author }}
                                            </span>
                                        </div>
                                        <a href="{{ route('book.read', $book) }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                            Read Now
                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
                                    </div>
                                </article> 
                                
                                   
                                @empty
                                    <div class="col-span-2 text-center lg:mb-16 mb-8 dark:text-white">
                                        No book in your collection.  <a href="{{ route('book.market') }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                             Go to Market to Borrow
                                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </a>
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
s