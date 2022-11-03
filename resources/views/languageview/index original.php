<x-base-component>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('language.store') }}">
            @csrf
            <input type="text" name="code" placeholder="{{ __('Code') }}" autocomplete="off" required
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('code') }}</input>
            <x-input-error :messages="$errors->get('code')" class="mt-2" />

            <input type="text" name="english_name" placeholder="{{ __('english_name') }}" autocomplete="off" required
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('english_name') }}</input>
            <x-input-error :messages="$errors->get('english_name')" class="mt-2" />


            <select class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" aria-label="Default select example" name="directionality" required>               
                <option value="ltr">Left Top Right</option>
                <option value="rtl">Right Top Left</option>
            </select>
            <x-input-error :messages="$errors->get('directionality')" class="mt-2" />


            <input type="text" name="local_name" placeholder="{{ __('local_name') }}" autocomplete="off"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('local_name') }}</input>
            <x-input-error :messages="$errors->get('local_name')" class="mt-2" />


            <input type="text" name="url_wiki" placeholder="{{ __('url_wiki') }}" autocomplete="off"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('url_wiki') }}</input>
            <x-input-error :messages="$errors->get('url_wiki')" class="mt-2" />



            <x-primary-button class="mt-4">{{ __('Save Language') }}</x-primary-button>

        

        </form>
    </div>
    </x-base-layout>
