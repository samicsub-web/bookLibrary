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
                                    Ref
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Customer
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Book Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Amount(NGN)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="px-6 py-4">
                                    {{ $transaction->app_ref }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $transaction->book->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $transaction->amount }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($transaction->status == 0)
                                        <span class="dark:bg-primary-900 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Pending</span>
                                    @elseif($transaction->status == 1)
                                        <span class="dark:bg-green-900 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Approved</span>
                                    @elseif($transaction->status == 2)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Rejected</span>
                                    @elseif($transaction->status == 3)
                                        <span class="dark:bg-gray-400 dark:text-white bg-slate-50 p-1 text-xs rounded-md h-4 w-4">Released</span>
                                    @endif
                                </td>
                                
                                <td>
                                    {{ $transaction->created_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5" class="px-6 text-lg text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No Transaction record found. 
                                </th>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>

    </div>

</div>