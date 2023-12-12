@extends('dashboard.layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
        {{ isset($product) ? 'Edit' : 'Create' }}
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="POST"
                        action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($product)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="$product->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="category" value="Category" />
                            <x-select-input name="category" class="mt-1 block w-full">
                                <option {{ old('category') == 'Daily' ? 'selected' : '' }} value="Daily">Daily</option>
                                <option {{ old('category') == 'Monthly' ? 'selected' : '' }} value="Monthly">Monthly
                                </option>
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>
                        <div>
                            <x-input-label for="price" value="Price" />
                            <x-text-input id="price" name="price" type="number" step="0.01" min=0
                                class="mt-1 block w-full" :value="$product->price ?? old('price')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="description" value="Description" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="description" name="description" class="mt-1 block w-full" required
                                autofocus>{{ $product->description ?? old('description') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in image_preview
                document.getElementById('image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
