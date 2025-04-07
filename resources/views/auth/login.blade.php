<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
                    <a href="/" class="flex items-center gap-2">
                        <span class="text-xl font-bold">Poupi</span>
                    </a>
                </div>
                <nav class="hidden md:flex gap-6">
                    <a href="{{ route('welcome') }}" class="text-sm font-medium hover:text-green-500">Inicio</a>
                    <a href="#pricing" class="text-sm font-medium hover:text-green-500">Pricing</a>
                    <a href="#testimonials" class="text-sm font-medium hover:text-green-500">Testimonials</a>
                </nav>
            </div>
        </header>

        <!-- Main content -->
        <main class="flex-1 flex items-center justify-center py-12 px-4">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-100">
                    <!-- Form header -->
                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-bold">Bem vindo(a)</h1>
                        <p class="text-gray-500 mt-2">Entre na sua conta para continuar</p>
                    </div>

                    <!-- Login form -->
                    <form action="{{ route('login') }}" method="POST">
                        <!-- CSRF Token placeholder -->
                        @csrf

                        <!-- Email input -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="name@example.com">
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <div class="flex justify-between items-center mb-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                                <a href="{{ route('password.request') }}" class="text-xs text-green-600 hover:text-green-700">Esqueci sua senha?</a>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                placeholder="••••••••">
                        </div>

                        <!-- Remember me checkbox -->
                        <div class="flex items-center mb-6">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-green-500 border-gray-300 rounded focus:ring-green-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Relembre me</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Entrar
                        </button>
                    </form>

                    <!-- Sign up link -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Não tem uma conta?
                            <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 font-medium">Registre se</a>
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full border-t bg-white py-6">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2">
                    <span class="text-green-500 text-xl font-bold">$</span>
                    <span class="text-xl font-bold">Poupi</span>
                </div>
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Poupi. Todos os direitos reservados.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-green-500">Termos</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-green-500">Privacidade</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>