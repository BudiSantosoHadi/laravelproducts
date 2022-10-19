<div class="max-w-6xl mx-auto">
    <div class="flex justify-end p-2 m-2">
        <x-jet-button wire:click='showProductsModal'>Create Products</x-jet-button>
    </div>

    <div class="p-2 m-2">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">No</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200"> Images</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200"> Name</th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200"> Price</th>

                    <th scope="col" class="relative px-6 py-3">Edit</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr></tr>
                    @foreach ($product as $no => $products)
                    <tr>

                    <td class="px-6 py-4 whitespace-nowrap">{{ $no+1 }}</td>
                    <td class="justify-start px-2 whitespace-nowrap">
                        <img class="w-20 h-1 rounded-full " src="{{ Storage::url($products->images) }}" />
                    </td>
                    <td class="px-6 py-4 text-left whitespace-nowrap">{{ $products->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-ellipsis">{{ $products->price }}</td>

                    <td class="px-6 py-4 text-sm text-left">
                        <a href="#">
                            <iconify-icon icon="entypo:trash" style="color: red;" width="20" height="20"></iconify-icon>
                        </a>
                        <a href="#">
                            <iconify-icon icon="fa6-solid:square-pen" width="20" height="20" style="color: #2f9347;"></iconify-icon>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                    <!-- More items... -->
                </tbody>
                </table>
                <div class="p-2 container-fluid">
                    <div class="p-2 m-2">Pagination</div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <x-jet-dialog-modal wire:model="showingProductsModal">
            <x-slot name="title">Products Create</x-slot>
            <x-slot name="content">
                <div class="mt-2 space-y-8 divide-y divide-gray-200 w-100">
                    <form enctype="multipart/form-data">
                    <div class="mt-3 sm:col-span-8">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                        <input type="text" id="title" wire:model.lazy="title" name="title"
                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                        </div>
                        @error('title') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3 sm:col-span-8">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                        <input type="number" id="price" wire:model.lazy="price" name="price"
                        class="w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                        </div>
                        @error('price') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3 sm:col-span-8">
                        <label for="image" class="block text-sm font-medium text-gray-700">Images</label>
                        @if ($newImage)
                        Photo Preview:
                        <img width="200px" height="200px" src="{{ $newImage->temporaryUrl() }}">
                        @endif
                        <div class="mt-1">
                        <input type="file" id="image" wire:model="newImage" name="image"
                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
                        </div>
                        @error('newImage') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="pt-5 mt-2 sm:col-span-8">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                        <textarea id="description" rows="3" wire:model.lazy="description"
                        class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-300 border-gray-400 rounded-md shadow-sm appearance-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        </div>
                        @error('description') <span class="text-red-400">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click='storeProducts'>Create Now</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
