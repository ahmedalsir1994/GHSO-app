<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="/dashboard" class="text-gray-600 hover:text-gray-900 transition">← Dashboard</a>
                <h1 class="text-3xl font-bold text-gray-900 mt-1">Contact Messages</h1>
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
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">From</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Email</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Subject</th>
                            <th class="px-6 py-3 text-left text-gray-700 font-medium">Date</th>
                            <th class="px-6 py-3 text-right text-gray-700 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($contacts as $contact)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-900">{{ $contact->name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $contact->email }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $contact->subject }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $contact->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="{{ route('contacts.show', $contact) }}"
                                        class="text-blue-600 hover:text-blue-700 text-sm font-medium">View</a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-slate-500">No messages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">{{ $contacts->links() }}</div>
    </main>
</body>

</html>