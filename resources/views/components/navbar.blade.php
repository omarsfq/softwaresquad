<nav x-data="{ open: false }" class="bg-white shadow-md sticky top-0 z-50" aria-label="التنقل الرئيسي">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center space-x-2 space-x-reverse">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 space-x-reverse">
                    <img src="{{ asset('images/logo.jpg') }}" alt="شعار فريق Software Squad" class="h-10 w-auto rounded-md shadow-sm">
                    <span class="text-lg font-bold text-gray-800 hover:text-brand-blue transition duration-200">
                        Software Squad
                    </span>
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8 space-x-reverse">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">الرئيسية</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">من نحن</a>
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">مشاريعنا</a>
                <a href="{{ route('contact.form') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">تواصل معنا</a>
                @can('access-admin')
                    <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-brand-blue px-3 py-2 rounded-md text-sm font-medium">لوحة التحكم</a>
                @endcan
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-brand-blue">
                    <span class="sr-only">فتح القائمة الرئيسية</span>
                    <svg :class="{'hidden': open, 'block': !open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{'hidden': !open, 'block': open }" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">الرئيسية</a>
            <a href="{{ route('about') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">من نحن</a>
            <a href="{{ route('projects.index') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">مشاريعنا</a>
            <a href="{{ route('contact.form') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">تواصل معنا</a>
            @can('access-admin')
                <a href="{{ route('admin.projects.index') }}" class="block text-gray-600 hover:text-brand-blue hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">لوحة التحكم</a>
            @endcan
        </div>
    </div>
</nav>
