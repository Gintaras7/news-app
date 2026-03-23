<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Inter', sans-serif;
                @apply bg-gray-100 text-gray-900 antialiased;
            }
        }
        @layer components {
            .btn-primary {
                @apply bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-md transition duration-150 ease-in-out inline-flex justify-center items-center;
            }
            .btn-secondary {
                @apply bg-white hover:bg-gray-50 text-gray-700 font-medium py-2 px-4 border border-gray-300 rounded-md transition duration-150 ease-in-out inline-flex justify-center items-center;
            }
            .btn-danger {
                @apply bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition duration-150 ease-in-out inline-flex justify-center items-center cursor-pointer border-none;
            }

            .form-input-error {
                @apply border-red-500 text-sm text-red-600;
            }
            .link-primary {
                @apply text-indigo-600 hover:underline;
            }
            .link-secondary {
                @apply text-gray-500 hover:text-gray-700 text-sm font-medium;
            }
            .link-danger {
                @apply text-red-500 hover:text-red-700 cursor-pointer bg-transparent border-none p-0;
            }
            .link-info {
                @apply text-blue-600 hover:underline;
            }
        }
    </style>
</head>

<body class="antialiased text-gray-900">
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-center flex items-center h-16">
                <a href="{{ route('articles.index') }}" class="text-xl font-bold text-indigo-600">News App</a>
            </div>
        </div>
    </nav>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>

</html>