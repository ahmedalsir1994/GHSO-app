<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 transition">← Back</a>
                <h1 class="text-3xl font-bold text-gray-900 mt-1">Create New User</h1>
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

        <form action="{{ route('users.store') }}" method="POST"
            class="bg-white border border-gray-200 rounded-lg p-6 space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-2">Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Password *</label>
                <input type="password" name="password" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Confirm Password *</label>
                <input type="password" name="password_confirmation" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
            </div>

            <div class="flex gap-4">
                <button type="submit"
                    class="bg-cyan-600 hover:bg-cyan-700 text-white px-6 py-2 rounded-lg transition font-medium">Create
                    User</button>
                <a href="{{ route('users.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-6 py-2 rounded-lg transition font-medium">Cancel</a>
            </div>
        </form>
    </main>
</body>

</html>