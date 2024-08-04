<div class="bg-white lg:h-[500px] flex flex-col border gap-y-4 px-5">

    <header class="w-full border-b py-2">
        <div class="flex justify-between">

            <button wire:click="$dispatch('closeModal')" class="font-bold text-red-500">Close</button>

            <div class="text-lg font-bold">
                New post
            </div>

            <button @disabled(count($media)==0) wire:loading.attr='disabled' wire:click='submit' class="font-bold text-blue-500 ">
                Post
            </button>
        </div>

    </header>



    <main class="grid grid-cols-12 gap-3 h-full w-full overflow-hidden">


        {{-- Media --}}
        <div class="lg:col-span-7  m-auto items-center w-full">

            @if (count($media) == 0)
                <label for="customFileInput" class=" m-auto max-w-fit flex-col flex gap-3 cursor-pointer">
                    <input wire:model.live="media" type="file" multiple accept=".jpg,.png,.jpeg,.mp4,.mov"
                        id="customFileInput" type="text" class="sr-only">
                    <span class="m-auto">

                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1z" />
                        </svg>

                    </span>

                    <span class="bg-blue-500 text-white text-sm rounded-lg p-2 px-4">
                        Upload files from computer
                    </span>

                </label>
            @else
                <div class="flex overflow-x-scroll w-[500px] h-96 snap-x snap-mandatory gap-2 px-2">


                    @foreach ($media as $file)
                        <div class="w-full h-full shrink-0 snap-always snap-center">

                            @if (strpos($file->getMimeType(), 'image') !== false)
                                <img src="{{ $file->temporaryUrl() }}" alt=""
                                    class="w-full h-full object-contain">
                            @elseif (strpos($file->getMimeType(), 'video') !== false)
                                <x-video :source="$file->temporaryUrl()" />
                            @endif
                        </div>
                    @endforeach




                </div>
            @endif







        </div>



        <div class="lg:col-span-5 h-full border-l p-3 flex gap-4 flex-col overflow-hidden overflow-y-scroll">

            <div class="flex items-center gap2">
                <x-avatar class="w-9 h-9 " />
                <h5 class=" ml-2 font-bold">{{ auth()->user()->username }}</h5>
            </div>

            <div>
                <textarea wire:model="description" class="border-0 focus:border-0 px-0 w-full rounded-lg bg-white h-32 focus:outline-none focus:ring-0"
                    name="" id="" cols="30" rows="10" placeholder="Add description"></textarea>
            </div>

        </div>


    </main>




    <footer>


    </footer>
</div>
