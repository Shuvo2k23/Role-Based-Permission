<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
        <a href="{{ route('articles.index') }}" class="bg-slate-700 text-white px-4 py-2 rounded-md">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="m-2 ">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" value="{{ $article->title }}">
                        </div>
                        <div class="m-2">{{ $errors->first('title') }}</div>
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" value="{{ $article->author }}">
                        </div>
                        <div class="m-2">{{ $errors->first('author') }}</div>
                            <label for="text">Content</label>
                            <textarea name="text" id="text" >{{ $article->text }}</textarea>
                        </div>
                            <p class="text-red-500">{{ $errors->first('text') }}</p>

                        <button type="submit" class="bg-slate-700 tex-sm rounded-md px-5 py-3 mt-5 text-white">Update Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
