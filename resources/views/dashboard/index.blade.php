<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .animate-slide-in {
            animation: slideIn 0.6s ease-out forwards;
        }

        .stat-card {
            animation: fadeIn 0.6s ease-out forwards;
        }

        .stat-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stat-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stat-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stat-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .stat-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .stat-card:nth-child(6) {
            animation-delay: 0.6s;
        }
    </style>
</head>

<body class="bg-white min-h-screen">
    <!-- Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-linear-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h1
                        class="text-2xl font-bold bg-linear-to-r from-blue-600 to-blue-700 bg-clip-text text-transparent">
                        Admin Dashboard</h1>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 hover:bg-gray-100 rounded-lg transition text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-20 h-10 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center hover:opacity-90 transition text-white font-medium">
                            Logout
                        </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="mb-8 animate-fade-in">
            <h2 class="text-4xl font-bold text-gray-900 mb-2">Welcome to Admin Panel</h2>
            <p class="text-gray-600 text-lg">Monitor and manage all your event data in one place</p>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Agendas Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-blue-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Agendas</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_agendas'] }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg group-hover:bg-blue-200 transition">
                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>

            <!-- Speakers Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-emerald-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-emerald-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Speakers</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_speakers'] }}</p>
                        </div>
                        <div class="bg-emerald-100 p-3 rounded-lg group-hover:bg-emerald-200 transition">
                            <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>

            <!-- Sponsors Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-purple-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-purple-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Sponsors</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_sponsors'] }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg group-hover:bg-purple-200 transition">
                            <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 7H7v6h6V7z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>

            <!-- Messages Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-amber-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-amber-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Messages</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_contacts'] }}</p>
                        </div>
                        <div class="bg-amber-100 p-3 rounded-lg group-hover:bg-amber-200 transition">
                            <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>

            <!-- Pages Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-red-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-red-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Pages</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_pages'] }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-lg group-hover:bg-red-200 transition">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>

            <!-- Users Card -->
            <div
                class="stat-card group relative overflow-hidden bg-white border border-gray-200 rounded-xl p-6 hover:border-cyan-400 hover:shadow-lg transition-all duration-300">
                <div
                    class="absolute inset-0 bg-linear-to-r from-cyan-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Total Users</p>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $stats['total_users'] }}</p>
                        </div>
                        <div class="bg-cyan-100 p-3 rounded-lg group-hover:bg-cyan-200 transition">
                            <svg class="w-6 h-6 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2a1 1 0 001 1h6a1 1 0 001-1v-2zM16 15v2a1 1 0 001 1h2a1 1 0 001-1v-2a4 4 0 00-4-4h-1.5a4 4 0 00-4 4v2a1 1 0 001 1h2a1 1 0 001-1v-2a2 2 0 012-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Updated today</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <a href="/admin/agendas"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-blue-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">Manage Agendas</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="/admin/speakers"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-emerald-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-emerald-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">Manage Speakers</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="/admin/sponsors"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-purple-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-purple-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 7H7v6h6V7z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">Manage Sponsors</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="/admin/pages"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-red-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-red-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.3A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">Manage Pages</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="/admin/contacts"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-amber-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-amber-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">View Messages</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <a href="/admin/users"
                class="group relative overflow-hidden bg-white border border-gray-200 rounded-lg p-4 hover:border-cyan-400 hover:shadow-md transition-all flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-cyan-100 p-2 rounded-lg">
                        <svg class="w-5 h-5 text-cyan-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2a1 1 0 001 1h6a1 1 0 001-1v-2zM16 15v2a1 1 0 001 1h2a1 1 0 001-1v-2a4 4 0 00-4-4h-1.5a4 4 0 00-4 4v2a1 1 0 001 1h2a1 1 0 001-1v-2a2 2 0 012-2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-gray-900 font-medium">Manage Users</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:translate-x-1 transition" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Recent Data Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Recent Agendas -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Agendas</h3>
                    <a href="/admin/agendas" class="text-blue-600 hover:text-blue-700 text-sm font-medium">View All
                        →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Title</th>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($agendas as $agenda)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 text-gray-900">{{ Str::limit($agenda->title ?? 'N/A', 25) }}</td>
                                    <td class="px-6 py-3 text-gray-600">{{ $agenda->start_time ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Speakers -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Speakers</h3>
                    <a href="/admin/speakers" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View
                        All →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Name</th>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Organization</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($speakers as $speaker)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 text-gray-900">{{ $speaker->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-3 text-gray-600">{{ $speaker->organization ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Sponsors -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Sponsors</h3>
                    <a href="/admin/sponsors" class="text-purple-600 hover:text-purple-700 text-sm font-medium">View All
                        →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Name</th>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Category</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($sponsors as $sponsor)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 text-gray-900">{{ $sponsor->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-3"><span
                                            class="px-2 py-1 text-xs bg-purple-100 text-purple-700 rounded">{{ $sponsor->category ?? 'General' }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Messages -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Messages</h3>
                    <a href="/admin/contacts" class="text-amber-600 hover:text-amber-700 text-sm font-medium">View All
                        →</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">From</th>
                                <th class="px-6 py-3 text-left text-gray-700 font-medium">Subject</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($contacts as $contact)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-3 text-gray-900">{{ $contact->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-3 text-gray-600">{{ Str::limit($contact->subject ?? 'N/A', 20) }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-8 text-center text-gray-500">No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="border-t border-gray-200 pt-6 pb-4 text-center text-gray-600 text-sm">
            <p>&copy; 2024 GHSO Admin Dashboard. All rights reserved.</p>
        </footer>
    </main>
</body>

</html>