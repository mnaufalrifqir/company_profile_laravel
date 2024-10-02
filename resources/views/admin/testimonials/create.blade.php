<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('New Testimonial') }}
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
                <form method="POST" action="{{route('admin.testimonials.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="project_client" :value="__('Project Client')" />
                        
                        <select name="project_client_id" id="project_client_id" class="py-3 rounded-lg pl-3 w-full dark:bg-gray-900 text-[#9ca3af]">
                            <option value="">Choose project client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('project_client')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="message" :value="__('Message')" />
                        <textarea name="message" id="message" cols="30" rows="5" class="dark:bg-gray-900 rounded-xl w-full text-[#9ca3af]"></textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
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
