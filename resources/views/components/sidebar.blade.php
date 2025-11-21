<div x-data="{ open: false }" class="flex">

    <!-- Sidebar -->
    <div 
        x-show="open"
        class="w-64 bg-gray-800 text-white min-h-screen p-4 space-y-4"
    >
        <h2 class="text-xl font-semibold mb-4">Menu</h2>

        <a href="{{ route('user.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">
            Home
        </a>

        <a href="{{ route('posts.view') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">
            Forum
        </a>

        <a href="{{ route('profile.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">
            User Profile
        </a>

        <form method="POST" action="{{ route('user.logout') }}">
            @csrf
            <button class="w-full text-left py-2 px-3 hover:bg-red-600 rounded">
                Logout
            </button>
        </form>
    </div>

    <!-- Toggle Button -->
    <button
        @click="open = !open"
        class="p-2 bg-gray-800 text-white rounded-r-md"
    >
        <span x-show="!open"></span>
        <span x-show="open"></span>
    </button>
</div>