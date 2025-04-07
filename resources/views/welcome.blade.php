<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Poupi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50/30">
    <div class="flex flex-col min-h-screen">
        <!-- Header with navigation -->
        <header class="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur">
            <div class="container mx-auto px-4 flex h-16 items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="text-green-500 text-2xl font-bold"></span>
                    <span class="text-xl font-bold">Poupi</span>
                </div>
                <nav class="hidden md:flex gap-6">
                    <a href="#features" class="text-sm font-medium hover:text-green-500">Features</a>
                    <a href="#pricing" class="text-sm font-medium hover:text-green-500">Pricing</a>
                    <a href="#testimonials" class="text-sm font-medium hover:text-green-500">Testimonials</a>
                </nav>
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-sm">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Registrar</a>
                </div>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-1">
            <!-- Hero section with two columns -->
            <section class="w-full py-12 md:py-24 lg:py-32 bg-green-50/60">
                <div class="container mx-auto px-4 md:px-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <!-- Left column with text -->
                        <div>
                            <h1 class="text-5xl font-bold tracking-tight">Gerencie suas finanças com facilidade</h1>
                            <p class="text-lg text-gray-600 mt-6">Acompanhe sua renda, despesas e economias em um só lugar. Obtenha insights sobre sua saúde financeira e tome melhores decisões.</p>
                            <div class="mt-8 flex flex-wrap gap-4">
                                <a href="{{ route('register') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 flex items-center gap-2">
                                    Comece Agora
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="#features" class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">Saiba Mais</a>
                            </div>
                        </div>
                        <!-- Right column with image -->
                        <div class="flex justify-center">
                            <div class="w-full flex items-center justify-center">
                                <img src="{{ asset('images/welcome-image.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features section -->
            <section id="features" class="w-full py-12 md:py-24 lg:py-32">
                <div class="container mx-auto px-4 md:px-6 text-center">
                    <h2 class="text-3xl font-bold sm:text-4xl">Features</h2>
                    <p class="max-w-lg mx-auto text-gray-500 md:text-xl mt-4">Everything you need to manage your finances.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                        <div class="p-6 border rounded-lg shadow-sm">
                            <div class="bg-green-100 p-3 rounded-full w-12 h-12 mx-auto flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                                    <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                                    <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                                    <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mt-4">Expense Tracking</h3>
                            <p class="text-gray-500 mt-2">Track all your expenses in one place.</p>
                        </div>
                        <div class="p-6 border rounded-lg shadow-sm">
                            <div class="bg-green-100 p-3 rounded-full w-12 h-12 mx-auto flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                                    <path d="M20.2 7.8l-7.7 7.7-4-4-5.7 5.7"></path>
                                    <path d="M15 7h6v6"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mt-4">Savings Goals</h3>
                            <p class="text-gray-500 mt-2">Set and track your savings goals.</p>
                        </div>
                        <div class="p-6 border rounded-lg shadow-sm">
                            <div class="bg-green-100 p-3 rounded-full w-12 h-12 mx-auto flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold mt-4">Secure Data</h3>
                            <p class="text-gray-500 mt-2">Your financial data is encrypted.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="w-full border-t bg-white py-6">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2">
                    <span class="text-green-500 text-xl font-bold">$</span>
                    <span class="text-xl font-bold">Poupi</span>
                </div>
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Poupi. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-green-500">Terms</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-green-500">Privacy</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>