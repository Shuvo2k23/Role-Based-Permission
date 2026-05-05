<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article List ') }}
        </h2>
        <a href="{{ route('articles.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Create Article</a>
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
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Author</th>
                                <th class="px-4 py-2">Created At</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td class="border px-4 py-2">{{ $article->id }}</td>
                                    <td class="border px-4 py-2">{{ $article->title }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $article->author }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $article->created_at->format('d M Y') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
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
