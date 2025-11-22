<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Speaker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-4">
                <a href="{{ route('speakers.index') }}" class="text-gray-600 hover:text-gray-900 transition">← Back</a>
                <h1 class="text-3xl font-bold text-gray-900 mt-1">Edit Speaker: {{ $speaker->name }}</h1>
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

        <form action="{{ route('speakers.update', $speaker) }}" method="POST" enctype="multipart/form-data"
            class="bg-white border border-gray-200 rounded-lg p-6 space-y-6">
            @csrf @method('PUT')

            <div>
                <label class="block text-gray-700 font-medium mb-2">Name *</label>
                <input type="text" name="name" value="{{ old('name', $speaker->name) }}" required
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $speaker->title) }}"
                        class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Organization</label>
                    <input type="text" name="organization" value="{{ old('organization', $speaker->organization) }}"
                        class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                </div>
            </div>



            <div>
                <label class="block text-gray-700 font-medium mb-2">Photo</label>

                @if($speaker->photo && file_exists(public_path('images/' . $speaker->photo)))
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Current Photo:</p>
                        <img src="{{ asset('images/' . $speaker->photo) }}" alt="{{ $speaker->name }}"
                            class="w-32 h-40 object-cover rounded-lg border border-gray-300">
                    </div>
                @endif

                <input type="file" name="photo" accept="image/*"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                <p class="text-sm text-gray-500 mt-1">Accepted formats: PNG, JPG, webp, SVG (Max 2MB)</p>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Logo</label>
                <input type="file" name="logo" accept="image/*"
                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2 text-gray-900 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
                <p class="text-sm text-gray-500 mt-1">Accepted formats: PNG, JPG, webp, SVG (Max 2MB)</p>
            </div>


            <div class="flex gap-4">
                <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg transition font-medium">Update
                    Speaker</button>
                <a href="{{ route('speakers.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-900 px-6 py-2 rounded-lg transition font-medium">Cancel</a>
            </div>
        </form>
    </main>
</body>

</html>