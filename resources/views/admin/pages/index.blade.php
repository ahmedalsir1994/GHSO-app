<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pages</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <a href="/dashboard" class="text-gray-600 hover:text-gray-900 transition">← Dashboard</a>
                    <h1 class="text-3xl font-bold text-gray-900 mt-1">Manage Pages</h1>
                </div>
                <a href="{{ route('pages.create') }}"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition font-medium">+ New
                    Page</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if ($message = Session::get('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">{{ $message }}</div>
        @endif

        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Title</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Slug</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Language</th>
                            <th class="px-6 py-3 text-right text-gray-700 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($pages as $page)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-900">{{ $page->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $page->slug }}</td>
                                <td class="px-6 py-4"><span
                                        class="px-2 py-1 text-xs {{ $page->language === 'en' ? 'bg-blue-100 text-blue-700' : 'bg-emerald-100 text-emerald-700' }} rounded">{{ strtoupper($page->language) }}</span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('pages.edit', $page) }}"
                                        class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</a>
                                    <form action="{{ route('pages.destroy', $page) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500">No pages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $pages->links() }}</div>
    </main>
</body>

</html>