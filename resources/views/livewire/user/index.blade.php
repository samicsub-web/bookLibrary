<div>
    <x-slot name="header">
        <div  class="inline-flex gap-3 dark:text-white">
        <a href="{{ route('book.index') }}"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> Books</h2></a>
        /
        <span class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
            {{ __('Users') }}
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
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Books Read
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Joined At
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->books_count }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                
                                <td class="px-6 py-4 text-right inline-flex gap-3">
                                    <a href="{{ route('users.show', $user) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5" class="px-6 text-lg text-center py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    No Regular User Record Found
                                </th>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>

    </div>

</div>