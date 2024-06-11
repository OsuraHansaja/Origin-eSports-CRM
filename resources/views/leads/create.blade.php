<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Lead') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{route('leads.store')}}" method='POST'>
                    @csrf
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="phone" value="{{ __('Phone') }}" />
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone]')"  />
                        @error('phone')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="message" value="{{ __('Message') }}" />
                        <x-input id="message" class="block mt-1 w-full" type="text" name="message" :value="old('message]')"  />
                        @error('message')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <x-select id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status]')"  >
                            <option value="">Select</option>
                            <option value="new">New</option>
                            <option value="contacted">Contacted</option>
                            <option value="converted">Converted</option>
                        </x-select>
                        @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <x-button class="mt-5">Submit</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
