<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                            <p class="text-red-500">{{ $errors->first('name') }}</p>
                        {{-- <div>
                            <label for="description">Description</label>
                            <textarea name="description" id="description"></textarea>
                        </div> --}}
                        <button type="submit" class="bg-slate-700 tex-sm rounded-md px-5 py-3 text-white">Create Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
