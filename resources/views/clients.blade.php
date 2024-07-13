<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    {{ __('Here are a list of your clients: ') }}
                    <br><br>
                    <ul>
                        @foreach ($clients as $client)
                            <li>
                                <div class="py-3 text-gray-900 mt-5">
                                    <h3 class="text-lg text-gray-500">{{ $client->name }}</h3>
                                    <p>{{ $client->redirect }}</p>
                                    <p>{{ $client->secret }}</p>
                                    {{-- 
                                    
                                        Redirect is for 
                                    
                                    --}}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-3 p-6 bg-white border-b border-gray-200">
                <form action="/oauth/clients" method="POST">
                    <div class="mt-2">
                        <label for="name" class="block"> Name </label>
                        <x-text-input type="text" name="name" placeholder="Client Name"></x-text-input>
                    </div>
                    <div class="mt-4">
                        <label for="redirect" class="block">
                            Redirect
                        </label>
                        <x-text-input type="text" name="redirect"
                            placeholder="https://myurl.com/callback"></x-text-input>
                    </div>
                    <div class="mt-4">
                        @csrf
                        <x-primary-button type="submit">Create Client</x-primary-button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
