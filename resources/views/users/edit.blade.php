<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
        <a href="{{ route('users.index') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                        </div>
                            <p class="text-red-500">{{ $errors->first('name') }}</p>
                        <div>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ $user->email }}" required>
                        </div>

                        <p class="text-red-500">{{ $errors->first('email') }}</p>
                        <div class="grid grid-cols-4">
                            @if ($roles->isNotEmpty())
                                @foreach ($roles as $role)

                                        <div class="mt-3">
                                            <input type="checkbox" class="rounded" name="roles[]" value="{{ $role->name }}" id="{{ $role->name }}" {{ $user->hasRole($role) ? 'checked' : '' }}>
                                            <label for="{{ $role->name }}" class="ml-2">{{ $role->name }}</label>
                                        </div>
                                @endforeach

                            @endif

                        </div>
                        <button type="submit" class="bg-slate-700 tex-sm rounded-md px-5 py-3 mt-5 text-white">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
