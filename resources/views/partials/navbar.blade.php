<header class="bg-white border-b border-gray-200" x-data="{ openNotifications: false, openProfile: false }">
    <div class="px-4 py-3 flex items-center justify-between sm:px-6 lg:px-8">
        <div class="flex items-center md:hidden">
            <span class="text-yellow-500 text-2xl font-bold">$</span>
            <span class="text-xl font-bold">Infinity Finance</span>
        </div>

        <div class="flex items-center gap-4 ml-auto">
            <!-- Dropdown Notificações -->
            <div class="relative">
                <button
                    @click="openNotifications = !openNotifications"
                    class="flex items-center text-gray-500 hover:text-gray-700 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                </button>

                <!-- Dropdown Content -->
                <div
                    x-show="openNotifications"
                    @click.away="openNotifications = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-72 bg-white rounded-md shadow-lg overflow-hidden z-50 border border-gray-200">
                    <div class="py-1">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <h3 class="text-sm font-medium text-gray-900">Notificações</h3>
                        </div>
                        <!-- Exemplo de notificação -->
                        <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-blue-100 p-2 rounded-full">
                                    <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Nova transação</p>
                                    <p class="text-xs text-gray-500">Você recebeu R$ 150,00</p>
                                    <p class="text-xs text-gray-400 mt-1">2 minutos atrás</p>
                                </div>
                            </div>
                        </a>
                        <!-- Ver todas -->
                        <div class="px-4 py-2 border-t border-gray-100 bg-gray-50 text-center">
                            <a href="#" class="text-xs font-medium text-blue-600 hover:text-blue-500">Ver todas as notificações</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dropdown Perfil -->
            <div class="border-l pl-4 flex items-center gap-2 relative">
                <div class="flex items-center gap-4">
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>
                    </div>
                    <span class="text-sm font-medium text-gray-500">|</span>
                    <button
                        @click="openProfile = !openProfile"
                        class="flex items-center gap-2 focus:outline-none">
                        <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                            <span class="text-xs font-medium text-gray-600">
                                {{ substr(Auth::user()->name, 0, 1) }}{{ substr(explode(' ', Auth::user()->name)[1] ?? '', 0, 1) }}
                            </span>
                        </div>
                    </button>
                </div>

                <!-- Dropdown Content -->
                <div
                    x-show="openProfile"
                    @click.away="openProfile = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute right-0 top-full mt-1 w-48 bg-white rounded-md shadow-lg z-50 border border-gray-200"
                    style="transform-origin: top right;">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            <svg class="h-4 w-4 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Configurações
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                <svg class="h-4 w-4 mr-2 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>