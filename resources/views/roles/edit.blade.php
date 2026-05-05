<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
        <a href="{{ route('roles.index') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $role->name }}" required>
                        </div>
                            <p class="text-red-500">{{ $errors->first('name') }}</p>
                        <div class="grid grid-cols-4">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                <div class="mt-3">
                                    <input type="checkbox" class="rounded" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->name }}" {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                                    <label for="{{ $permission->name }}" class="ml-2">{{ $permission->name }}</label>
                                </div>
                                @endforeach

                            @endif

                        </div>
                        <button type="submit" class="bg-slate-700 tex-sm rounded-md px-5 py-3 mt-5 text-white">Update Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
