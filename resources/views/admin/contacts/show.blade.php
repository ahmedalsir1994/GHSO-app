<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="{{ route('contacts.index') }}" class="text-gray-600 hover:text-gray-900 transition">← Back</a>
                <h1 class="text-3xl font-bold text-gray-900 mt-1">Message from {{ $contact->name }}</h1>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white border border-gray-200 rounded-lg p-6 space-y-6">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="text-gray-600 text-sm">From</label>
                    <p class="text-gray-900 text-lg font-medium">{{ $contact->name }}</p>
                </div>
                <div>
                    <label class="text-gray-600 text-sm">Email</label>
                    <p class="text-gray-900 text-lg"><a href="mailto:{{ $contact->email }}"
                            class="text-blue-600 hover:underline">{{ $contact->email }}</a></p>
                </div>
            </div>

            <div>
                <label class="text-gray-600 text-sm">Subject</label>
                <p class="text-gray-900 text-lg font-medium">{{ $contact->subject }}</p>
            </div>

            <div>
                <label class="text-gray-600 text-sm">Message</label>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>

            <div>
                <label class="text-gray-600 text-sm">Received</label>
                <p class="text-gray-900">{{ $contact->created_at->format('M d, Y \a\t H:i') }}</p>
            </div>

            <div class="flex gap-4">
                <a href="mailto:{{ $contact->email }}"
                    class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-2 rounded-lg transition font-medium">Reply
                    via Email</a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg transition font-medium"
                        onclick="return confirm('Are you sure?')">Delete Message</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>