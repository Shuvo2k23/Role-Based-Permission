<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role List ') }}
        </h2>
        @can('create roles')
        <a href="{{ route('roles.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Create Role</a>
        @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Permissions</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="border px-4 py-2">{{ $role->id }}</td>
                                    <td class="border px-4 py-2">{{ $role->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($role->permissions->isNotEmpty())
                                            @foreach ($role->permissions as $permission)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">{{ $permission->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">{{ $role->created_at->format('d M Y') }}</td>
                                    <td class="border px-4 py-2">
                                        @can('edit roles')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        @endcan
                                        @can('delete roles')
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
