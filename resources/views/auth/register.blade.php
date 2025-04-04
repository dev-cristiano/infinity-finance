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

<body class="bg-yellow-50/30">
    <div class="flex flex-col min-h-screen">
        <!-- Cabeçalho com navegação -->
        <header class="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur">
            <div class="container mx-auto px-4 flex h-16 items-center justify-between">
                <div class="flex items-center gap-2">
                    <a href="/" class="flex items-center gap-2">
                        <span class="text-yellow-500 text-2xl font-bold">$</span>
                        <span class="text-xl font-bold">Infinity Finance</span>
                    </a>
                </div>
                <nav class="hidden md:flex gap-6">
                    <a href="{{ route('welcome') }}" class="text-sm font-medium hover:text-yellow-500">Inicio</a>
                    <a href="#precos" class="text-sm font-medium hover:text-yellow-500">Preços</a>
                    <a href="#depoimentos" class="text-sm font-medium hover:text-yellow-500">Depoimentos</a>
                </nav>
            </div>
        </header>

        <!-- Conteúdo principal -->
        <main class="flex-1 flex items-center justify-center py-12 px-4">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-100">
                    
                    <!-- Formulário de cadastro -->
                    <form action="{{ route('register') }}" method="POST">
                        <!-- CSRF Token placeholder -->
                        @csrf

                        <!-- Nome completo -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome completo</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="Seu nome completo">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="nome@exemplo.com">
                        </div>

                        <!-- Senha -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="••••••••">
                            <p class="text-xs text-gray-500 mt-1">Mínimo de 8 caracteres</p>
                        </div>

                        <!-- Confirmação de senha -->
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirme sua senha</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"
                                placeholder="••••••••">
                        </div>

                        <!-- Termos e condições -->
                        <div class="flex items-start mb-6">
                            <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 mt-1 text-yellow-500 border-gray-300 rounded focus:ring-yellow-500">
                            <label for="terms" class="ml-2 block text-sm text-gray-700">
                                Eu concordo com os <a href="#" class="text-yellow-600 hover:text-yellow-700">Termos de Serviço</a> e <a href="#" class="text-yellow-600 hover:text-yellow-700">Política de Privacidade</a>
                            </label>
                        </div>

                        <!-- Botão de envio -->
                        <button type="submit" class="w-full bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Criar conta
                        </button>
                    </form>

                    <!-- Link para login -->
                    <div class="text-center mt-6">
                        <p class="text-sm text-gray-600">
                            Já tem uma conta?
                            <a href="{{ route('login') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Entrar</a>
                        </p>
                    </div>
                </div>

                <!-- Provedores OAuth (opcional) -->
                <!-- <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-yellow-50/30 text-gray-500">Ou continue com</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <button type="button" class="flex justify-center items-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                            </svg>
                        </button>
                        <button type="button" class="flex justify-center items-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50">
                            <svg class="h-5 w-5 text-[#1DA1F2]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </button>
                        <button type="button" class="flex justify-center items-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                        </button>
                    </div>
                </div> -->
            </div>
        </main>

        <!-- Rodapé -->
        <footer class="w-full border-t bg-white py-6">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2">
                    <span class="text-yellow-500 text-xl font-bold">$</span>
                    <span class="text-xl font-bold">Infinity Finance</span>
                </div>
                <p class="text-sm text-gray-500">&copy; {{ date('Y') }} Infinity Finance. Todos os direitos reservados.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-sm text-gray-500 hover:text-yellow-500">Termos</a>
                    <a href="#" class="text-sm text-gray-500 hover:text-yellow-500">Privacidade</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>