<div>
    <x-slot name="header">
        <div  class="inline-flex gap-3 dark:text-white">
        <a href="{{ route('book.index') }}"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> Books</h2></a>
        /
        <span class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Book Requests') }}
        </span>
        </div>
    </x-slot>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg dark:text-white mt-4 p-5">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
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
                            @forelse($requests as $request)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $request->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $request->book->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Illuminate\Support\Str::limit($request->note ?? '-', 30) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($request->status == 0)
                                        <span class="dark:bg-primary-900 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Pending</span>
                                    @elseif($request->status == 1)
                                        <span class="dark:bg-green-900 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Approved</span>
                                    @elseif($request->status == 2)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Rejected</span>
                                    @elseif($request->status == 3)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Released</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right inline-flex gap-3">
                                    <a href="{{ route('book.show', $request->book_id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>

                                    @can('admin')
                                        @if($request->status == 0 || $request->status == 2)
                                        <x-secondary-button wire:click="AcceptRequest({{ $request }}, 1)">Accept</x-secondary-button>
                                        <x-secondary-button wire:click="AcceptRequest({{ $request }}, 2)">Rejects</x-secondary-button>
                                        @endif
                                    @endcan
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