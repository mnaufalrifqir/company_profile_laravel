<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('New About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden p-10 shadow-sm sm:rounded-lg"> 
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{route('admin.abouts.store')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        
                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full text-[#9ca3af] dark:bg-gray-900">
                            <option value="">Choose type</option>
                            <option value="Visions">Visions</option>
                            <option value="Missions">Missions</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <h3 class="text-[#9ca3af] text-lg font-bold mt-4">Keypoints</h3>

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-5">
                            @for ($i = 0; $i < 3; $i++)
                                <input type="text" class="py-3 rounded-lg text-[#9ca3af] dark:bg-gray-900" placeholder="Write your keypoint" name="keypoints[]">
                            @endfor
                        </div>
                        <x-input-error :messages="$errors->get('keypoints')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 dark:bg-gray-600 text-white rounded-full">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
