<!-- Topbar -->
<nav id="topbar"
     class="bg-white dark:bg-bumud rounded-3xl px-6 py-3 my-4 mx-4 shadow-sm flex items-center justify-between relative z-10 border border-gray-200">
    <!-- Left Section: Logo + Sidebar Toggle -->
    <div class="flex items-center space-x-4">
        <!-- Sidebar Toggle for Mobile & Desktop -->
        <button id="sidebarToggle" class="text-jodeng hover:text-jotu dark:text-jobu  dark:hover:text-jocet">
            <i class="fas fa-bars"></i>
        </button>


        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <i class="fas fa-book-open text-jodeng dark:text-jobu text-xl"></i>
            <span class="text-lg font-semibold">MyApp</span>
        </div>
    </div>

    <!-- Right Section: User Menu + Notifications -->
    <div class="flex items-center space-x-4">
        <!-- Notification Bell Icon -->
        <button class="relative text-jodeng dark:text-jobu hover:text-jomud dark:hover:text-jocet focus:outline-none">
            <i class="fas fa-bell text-lg"></i>
            <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- User Dropdown -->
        <div class="relative inline-block text-left">
            <button type="button"
                    class="inline-flex items-center text-sm font-medium text-jodeng dark:text-jobu hover:text-jotu dark:hover:text-jocet focus:outline-none"
                    onclick="toggleDropdown('userDropdown')">
                <i class="fas fa-user-circle text-xl mr-2"></i>
                <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="userDropdown"
                 class="hidden absolute right-0 mt-2 w-48 origin-top-right bg-white border dark:bg-bumud border-gray-200 rounded-md shadow-lg z-50 scale-95 opacity-0 transform transition-all duration-200">
                <a href="{{ route('home') }}" target="_blank"
                   class="block px-4 py-2 text-sm text-jodeng dark:text-jobu hover:bg-gray-100 flex items-center">
                    <i class="fas fa-home mr-2"></i> View Site
                </a>
                <hr class="border-t border-gray-200 my-1">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Dark Mode Toggle -->
        <button id="darkModeToggle"
            class="text-jotu hover:text-jodeng dark:text-jobu focus:outline-none"
            title="Toggle dark mode"
            onclick="toggleDarkMode()">
            <i id="darkModeIcon" class="fas fa-moon"></i>
        </button>
    </div>
</nav>