<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('New Book Form') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Provide necessary and comprehensive information about your book") }}
                        </p>
                    </header>

                    <form wire:submit.prevent="update" class="mt-6 space-y-6">

                        <div class="flex md:flex-row md:justify-between md:gap-5">

                            <div class="w-full">
                                <x-input-label for="cover_photo" :value="__('Cover Photo')" />
                                <x-text-input id="cover_photo" wire:model="cover_photo" type="file" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('cover_photo')" />
                            </div>

                            <div class="w-full flex flex-col gap-2 dark:text-white">
                                @if($cover_photo)
                                    <p>Photo Preview:</p>
                                    <img src="{{$cover_photo->temporaryUrl() }}" class="w-25 h-25 " width="100">
                                @else

                                <p>Current Cover Preview:</p>
                                    <img src="{{asset($book->cover_photo) }}" class="w-25 h-25 " width="100">
                                @endif
                            </div>
                        </div>

                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" wire:model="title" type="text" class="mt-1 block w-full" required  autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="author" :value="__('Author\'s Name')" />
                                <x-text-input id="author" wire:model="author" type="text" class="mt-1 block w-full" required  autocomplete="author" />
                                <x-input-error class="mt-2" :messages="$errors->get('author')" />
                            </div>

                        </div>
                        
                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="language" :value="__('Language')" />
                                <x-text-input id="language" wire:model="language" type="text" class="mt-1 block w-full" required  autocomplete="language" />
                                <x-input-error class="mt-2" :messages="$errors->get('language')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="category" :value="__('Category')" />
                                <x-input-select wire:model="category" name="category" id="category">
                                    <option selected disabled>Select Category</option>
                                    @forelse ($book_category as $key => $cat)
                                        <option value="{{ $cat }}">{{ $key }}</option>
                                    @empty
                                        
                                    @endforelse
                                </x-input-select>
                                <x-input-error class="mt-2" :messages="$errors->get('category')" />
                            </div>

                        </div>
                        
                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="type" :value="__('Book Type')" />
                                <x-input-select wire:model="type">
                                    <option selected disabled>Select Book Type</option>
                                    @foreach ($book_types as $key => $value)
                                        <option value="{{ $value }}">{{ $key }}</option>                                        
                                    @endforeach
                                </x-input-select>
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>

                            {{-- TODO: Add the field to put edition number here --}}
                        </div>
                        
                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="name" :value="__('Pages')" />
                                <x-text-input id="name" wire:model="pages" type="number" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('pages')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="isbn" :value="__('ISBN Number')" />
                                <x-text-input id="isbn" wire:model="isbn" type="text" class="mt-1 block w-full" required autocomplete="isbn" />
                                <x-input-error class="mt-2" :messages="$errors->get('isbn')" />
                            </div>

                        </div>
                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="pub_in" :value="__('Published In: (Country)')" />
                                <x-text-input id="name" wire:model="pub_in" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('pub_in')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="pub_dates" :value="__('Publication Date')" />
                                <x-text-input id="pub_dates" wire:model="pub_date" type="date" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('pub_dates')" />
                            </div>

                        </div>
                        
                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="file" :value="__('Book File')" />
                                <x-text-input id="file" wire:model="file" type="file" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('file')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="rentage_period" :value="__('Rentage Period (in days)')" />
                                <x-text-input id="rentage_period" wire:model="rentage_period" type="number" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('rentage_period')" />
                            </div>

                        </div>
                        
                        <div class="flex md:flex-row md:justify-between md:gap-5 text-white">
                            
                            <div class="w-full">
                                <x-input-label for="is_free" :value="__('Book is Free')" />
                                <x-check-button :text="$is_free ? 'Book is Free': 'Not Free'" wire:model.lazy="is_free"/>
                                <x-input-error class="mt-2" :messages="$errors->get('is_free')" />
                            </div>

                            @if ($is_free == false)
                                
                            <div class="w-full">
                                <x-input-label for="rent_price" :value="__('Rentage Price (NGN)')" />
                                <x-text-input id="rent_price" wire:model="rent_price" type="number" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('rent_price')" />
                            </div>

                            @endif


                        </div>

                        <div class="flex md:flex-row md:justify-between md:gap-5">
                            
                            <div class="w-full">
                                <x-input-label for="summary" :value="__('Summary')" />
                                <x-textarea wire:model="summary" />
                                <x-input-error class="mt-2" :messages="$errors->get('summary')" />
                            </div>
                            
                            <div class="w-full">
                                <x-input-label for="description" :value="__('Book Description')" />
                                <x-textarea wire:model="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
