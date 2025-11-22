<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="{{ route('pages.index') }}" class="text-gray-600 hover:text-gray-900 transition">← Back</a>
                <h1 class="text-3xl font-bold text-gray-900 mt-1">Create New Page</h1>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pages.store') }}" method="POST"
            class="bg-white border border-gray-200 rounded-lg p-6 space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Content</label>
                <textarea name="content" rows="6"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">{{ old('content') }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Language</label>
                <select name="language"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500">
                    <option value="en" {{ old('language') === 'en' ? 'selected' : '' }}>English</option>
                    <option value="ar" {{ old('language') === 'ar' ? 'selected' : '' }}>Arabic</option>
                </select>
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition font-medium">Create
                    Page</button>
                <a href="{{ route('pages.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-6 py-2 rounded-lg transition font-medium">Cancel</a>
            </div>
        </form>
    </main>
</body>

</html>