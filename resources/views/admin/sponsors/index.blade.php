<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sponsors</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div>
                    <a href="/dashboard" class="text-gray-600 hover:text-gray-900 transition">← Dashboard</a>
                    <h1 class="text-3xl font-bold text-gray-900 mt-1">Manage Sponsors</h1>
                </div>
                <a href="{{ route('sponsors.create') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg transition font-medium">+
                    New Sponsor</a>
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
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Name</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Category</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Website</th>
                            <th class="px-6 py-3 text-right text-gray-700 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($sponsors as $sponsor)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-900">{{ $sponsor->name }}</td>
                                <td class="px-6 py-4 text-gray-600"><span
                                        class="px-2 py-1 text-xs bg-purple-100 text-purple-700 rounded">{{ $sponsor->category ?? 'General' }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $sponsor->website ? '✓' : '-' }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('sponsors.edit', $sponsor) }}"
                                        class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</a>
                                    <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-slate-500">No sponsors found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $sponsors->links() }}</div>
    </main>
</body>

</html>