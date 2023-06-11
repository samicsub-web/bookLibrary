<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>Book List here</p>

                    <x-link-button :link="route('book.create')">
                        {{ __('Add New Book') }}
                    </x-link-button>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Book Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rating/Reviews
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price (NGN)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Current Borrowers
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Borrow Requests
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ \Illuminate\Support\Str::limit($book->title, 40) }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $book->category->key }}
                                </td>
                                <td class="px-6 py-4 inline-flex items-center">
                                    <x-reviews :count="round($book->reviews->avg('rating') ?? 0)"/> /
                                    {{ $book->reviews->count() }} Reviews
                                </td>
                                <td class="px-6 py-4">
                                    @if($book->is_free)
                                        Free
                                    @else
                                        NGN {{ $book->rent_price }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $book->current_borrowers_count }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    {{ $book->unprocessed_requests_count }}
                                </td>
                                <td class="px-6 py-4 text-right inline-flex gap-3">
                                    <a href="{{ route('book.edit', $book) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:sunderline">Edit</a>
                                    <a href="{{ route('book.show', $book) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5" class="px-6 text-lg text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No books available yet. <a href="#" class="hover:underline hover:text-gray-300 font-bold">Create One</a>
                                </th>
                            </tr>
                            @endforelse
                            
                        </tbody>

                        <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">
                                    {{ $books->links() }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
    </div>
    
</div>
