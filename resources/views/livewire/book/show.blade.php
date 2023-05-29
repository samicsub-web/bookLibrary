<div>
    <x-slot name="header">
        <div  class="inline-flex gap-3 dark:text-white">
        <a href="{{ route('book.index') }}"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> Books</h2></a>
        /
        <span class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Show Book') }}
        </span>
        </div>
    </x-slot>

    {{-- @cannot('admin') --}}
    @if($book->my_request)
    <div class="pt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-white mt-4 p-5">
                <div class="flex flex-row gap-3 items-center">
                    <x-heroicon-o-bell class="h-5 w-5 "/>
                    @if($book->my_request->status == 0)
                        Your request to borrow this book is yet to be approved, please wait
                    @elseif($book->my_request->status == 1)
                        Congratulations, Your request has be approved, @if($book->is_free) you can now access the resource @else

                        Proceed to payment to get access. 

                        <x-secondary-button wire:click="payNow({{ $book }})">
                            {{ __('Pay  NGN') . $book->rent_price . '  For Borrowing Now' }} 
                        </x-secondary-button>

                        @endif
                    @elseif($book->my_request->status == 2)
                        Sorry Your request has been rejected at this moment
                    @elseif($book->my_request->status == 3)
                        You have onced requested and read this book
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endif
    {{-- @endcannot --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>Title: {{  $book->title }}</p>

                    @can('admin')
                        <x-link-button :link="route('book.edit', $book)">
                            {{ __('Edit Book') }}
                        </x-link-button>
                    @else
                        @if(!$book->my_request)
                            <x-secondary-button wire:click="submitRequest">
                                {{ __('Submit Request To Rent') }}
                            </x-secondary-button>
                        @elseif ($book->my_request?->status == 3 && $book->pivot?->return_date ? !\Carbon\Carbon::parse($book->pivot?->return_date)->isPast() : null)
                            <x-link-button :link="route('book.read', $book)">
                                {{ __('Start Reading') }}
                            </x-link-button>
                        @endif
                    @endcan
                </div>


                {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"></div> --}}
                <div class="flex flex-row justify-between items-center dark:text-white">
                    <div class="w-full m-5 flex justify-center">
                        <img src="{{ asset($book->cover_photo) }}" width="450" class="rounded-lg h-250 w-250"/>
                    </div>

                    <div class="w-full py-5 px-3 flex flex-col gap-3">
                        <p>Rating ({{ $book->reviews->avg('rating') ?? 'No review yet' }})
                        
                        @if($book->reviews->avg('rating') > 0)
                        <div class="flex items-center">
                            <x-reviews :count="round($book->reviews->avg('rating') ?? 0)"/>
                            <p class="sr-only">{{ round($book->reviews->avg('rating') ?? 0) }} out of 5 stars</p>
                            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $book->reviews->count() }} reviews</a>
                        </div>

                        @endif
                        </p>
                        <p class="font-bold text-2xl">{{ $book->title }}</p>

                        <p class="font-bold">by {{ $book->author }}</p>
                        <p class="font-bold">NGN {{ number_format($book->rent_price, 2) }} @if($book->is_free) (Free) @endif</p>
                        <p class="font-bold">{{ $book->description }}</p>
                        

                        <div class="w-full bg-gray-400 my-3 flex flex-row justify-around p-3 rounded-lg text-black">
                            <span>Rentage Period: {{ $book->rentage_period}}</span>
                            <span>Current Rentage: {{ $book->rent_count}}</span>
                            <span>Resource Type: <span class="p-1 rounded-md dark:bg-white bg-blue-500 text-black ">{{ $book->file_type}}</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-row justify-between items-cente dark:text-white m-10 gap-5">
                    <div class="w-full  flex flex-col justify-center rounded-lg border p-4 border-gray-200">
                        <div class="my-5 flex flex-col gap-3s">
                            <span class=" font-bold">Paperback</span>
                            <span class="text-blue-500 text-sm">Details</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">Paperback</span>
                                <span class="text-lg font-bold font-sans">{{ $book->pages }} pages</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">Publish</span>
                                <span class="text-lg font-bold font-sans">{{ $book->pub_in . ', ' . $book->pub_date->format('Y') }} </span>
                            </div>
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">ISBN</span>
                                <span class="text-lg font-bold font-sans">{{ $book->isbn }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">Language</span>
                                <span class="text-lg font-bold font-sans">{{ $book->language }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">Category</span>
                                <span class="text-lg font-bold font-sans">{{ $book->category->key }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="dark:text-gray-300">Book Type</span>
                                <span class="text-lg font-bold font-sans">{{ $book->type->key }}</span>
                            </div>
                        </div>

                    </div>

                    <div class="w-full">
                        <p class="text-lg font-bold">Book Summary</p>
                        <div class="relative overflow-x-auto dark:shadow-none shadow-md sm:rounded-lg">
                        <p>{{ $book->summary }}</p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    @can('admin')
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>Book Requests</p>

                    {{-- @cannot('admin')
                        <x-link-button :link="route('book.edit', $book)">
                            {{ __('Edit Book') }}
                        </x-link-button>
                    @else
                        <x-secondary-button wire:click="submitRequest">
                            {{ __('Submit Request To Rent') }}
                        </x-secondary-button>
                    @endcannot --}}
                </div>


                {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"></div> --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Customer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Book Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Note
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($book->book_requests as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $request->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $request->book_id == $book->id ? 'This Book' : $request->book->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Illuminate\Support\Str::limit($request->note, 30) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($request->status == 0)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">pending</span>
                                    @elseif($request->status == 1)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">approved</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right inline-flex gap-3">
                                    <x-secondary-button wire:click="AcceptRequest({{ $request }}, 1)">Accept</x-secondary-button>
                                    <x-secondary-button wire:click="AcceptRequest({{ $request }}, 2)">Rejects</x-secondary-button>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5" class="px-6 text-lg text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No Borrow request submitted on this book. 
                                </th>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @endcan

    @can('admin')
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>My Reviews</p>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4 p-5">

                    @if($book->my_review)
                    <article>
                        <div class="flex items-center mb-4 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="">
                            <div class="space-y-1 font-medium dark:text-white">
                                <p>{{ $book->my_review->user->name }} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on {{ $book->my_review->user->created_at->format('M Y') }}</time></p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1">
                            <x-reviews :count="$book->my_review->rating"/>
                        </div>
                        <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed on this day<time datetime="{{ $book->my_review->created_at }}">{{ $book->my_review->created_at->format('D, M Y') }}</time></p></footer>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $book->my_review->review }}</p>
                    </article>

                    @else

                    <form class="my-3" wire:submit.prevent="saveReview">
                        <div class="flex flex-col gap-3 mb-3">
                            <div class="inline-flex item-center">
                                <x-radio-button class="mask mask-star" value="1" wire:model="rating">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-100 font-bold inline-flex item-center gap-7">1 Star <x-reviews :count="1" /></span>
                                </x-radio-button>
                            </div>
                            <div class="inline-flex item-center">
                                <x-radio-button class="mask mask-star" value="2" wire:model="rating">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-100 font-bold inline-flex item-center gap-7">2 Star <x-reviews :count="2" /></span>
                                </x-radio-button>
                            </div>
                            <div class="inline-flex item-center">
                                <x-radio-button class="mask mask-star" value="3" wire:model="rating">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-100 font-bold inline-flex item-center gap-7">3 Star <x-reviews :count="3" /></span>
                                </x-radio-button>
                            </div>
                            <div class="inline-flex item-center">
                                <x-radio-button class="mask mask-star" value="4" wire:model="rating">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-100 font-bold inline-flex item-center gap-7">4 Star <x-reviews :count="4" /></span>
                                </x-radio-button>
                            </div>
                            <div class="inline-flex item-center">
                                <x-radio-button class="mask mask-star" value="5" wire:model="rating">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-100 font-bold inline-flex item-center gap-7">5 Star <x-reviews :count="5" /></span>
                                </x-radio-button>
                            </div>
                            
                        </div>
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="review" class="sr-only">Your review</label>
                            <textarea id="review" rows="3" wire:model="review"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a review..." required></textarea>

                            <x-input-error class="mt-2" :messages="$errors->get('review')" />

                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Post review
                        </button>
                    </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
    @endcan
    
    @can('admin')
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 dark:text-gray-100">
                    <p>Reviews ({{ $book->reviews->count() }})</p>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4 p-5">
                    @forelse($book->reviews as $review)
                    <article>
                        <div class="flex items-center mb-4 space-x-4">
                            <img class="w-10 h-10 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="">
                            <div class="space-y-1 font-medium dark:text-white">
                                <p>{{ $review->user->name }} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on {{ $review->user->created_at->format('M Y') }}</time></p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1">
                            <x-reviews :count="$review->rating"/>
                        </div>
                        <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed on this day <time datetime="{{ $review->created_at }}"> {{ $review->created_at->format('D, M Y') }}</time></p></footer>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $review->review }}</p>
                    </article>

                    @empty

                    <p class="text-center dark:text-white text-xl font-bold">No review on this book yet</p>

                    @endforelse

                </div>
            </div>
        </div>
    </div>
    @endcan

</div>
