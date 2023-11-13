<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">                     
                    <form method="POST" action="{{route('chirps.store')}}">
                        @csrf
                        <textarea name="info" id="info" cols="30" rows="10">{{old('info')}}</textarea>                        
                        <x-primary-button>ENVIAR</x-primary-button>
                    </form>
                    
                        @error('info') 
                        {{-- <div class="bg-red-600 text-white font-bold p-4">
                            {{ $message}}                            
                        </div> --}}
                        <x-input-error :messages="$errors->get('info')" />
                        @enderror
                    
                    @if(session('status'))
                    <div class="bg-green-600 text-white font-bold p-4">
                        {{ session('status')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
