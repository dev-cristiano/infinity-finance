<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Poupi</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
            <div class="p-4 border-b flex items-center gap-2">
                <span class="text-yellow-500 text-2xl font-bold">$</span>
                <span class="text-xl font-bold">Poupi</span>
            </div>
            <nav class="flex-1 overflow-y-auto p-4">
                <div class="space-y-1">
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                            <rect width="3" height="9" x="7" y="9"></rect>
                            <rect width="3" height="5" x="14" y="13"></rect>
                        </svg>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                            <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"></path>
                            <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"></path>
                            <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"></path>
                        </svg>
                        Transações
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                            <path d="M20.2 7.8l-7.7 7.7-4-4-5.7 5.7"></path>
                            <path d="M15 7h6v6"></path>
                        </svg>
                        Metas
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Orçamentos
                    </a>
                    <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                            <line x1="3" x2="21" y1="9" y2="9"></line>
                            <line x1="9" x2="9" y1="21" y2="9"></line>
                        </svg>
                        Relatórios
                    </a>
                </div>
                <div class="mt-8">
                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Configurações</h3>
                    <div class="mt-1 space-y-1">
                        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                <path d="M12 20h9"></path>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                            Perfil
                        </a>
                        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Configurações</h3>

                        </a>
                    </div>
                </div>
            </nav>
            <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center text-sm font-medium text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        Sair
                    </button>
                </form>
            </div>

        </aside>

        <!-- Mobile sidebar toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-20">
            <button type="button" class="bg-yellow-500 p-3 rounded-full text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top navbar -->
            <header class="bg-white border-b border-gray-200">
                <div class="px-4 py-4 flex items-center justify-between sm:px-6 lg:px-8">
                    <div class="flex items-center md:hidden">
                        <span class="text-yellow-500 text-2xl font-bold">$</span>
                        <span class="text-xl font-bold">Infinity Finace</span>
                    </div>
                    <div class="flex items-center gap-4 ml-auto">
                        <div class="relative">
                            <button class="flex items-center text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                </svg>
                                <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                            </button>
                        </div>
                        <div class="border-l pl-4 flex items-center gap-2">
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center">
                                <span class="text-xs font-medium text-gray-600">CR</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        <p class="mt-1 text-sm text-gray-500">Bem-vindo de volta, {{ Auth::user()->name }}! Aqui está uma visão geral das suas finanças.</p>
                    </div>
                    <div class="relative">
                        <button id="openModal" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-«r7»" data-state="closed"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus mr-2 h-4 w-4">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Nova Transação
                        </button>
                        <div id="dropdown" class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <button class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="openModal('pagar')">
                                Conta a Pagar
                            </button>
                            <button class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="openModal('receber')">
                                Conta a Receber
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600">
                                        <line x1="12" y1="1" x2="12" y2="23"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Saldo total</dt>
                                        <dd class="text-lg font-semibold text-gray-900">$24,500.00</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-yellow-600 hover:text-yellow-500">Ver todas as contas</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Renda (este mês)</dt>
                                        <dd class="text-lg font-semibold text-gray-900">$8,430.00</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-yellow-600 hover:text-yellow-500">Ver detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                                        <polyline points="17 18 23 18 23 12"></polyline>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Despesas (Este Mês)</dt>
                                        <dd class="text-lg font-semibold text-gray-900">$5,240.00</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-yellow-600 hover:text-yellow-500">Ver detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Progresso da meta de economia</dt>
                                        <dd class="text-lg font-semibold text-gray-900">68%</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-yellow-600 hover:text-yellow-500">Ver todos os objetivos</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
                    <!-- Income chart -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-5 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Receitas Mensais</h3>
                        </div>
                        <div class="p-5">
                            <div class="h-90 bg-gray-100 rounded flex items-center justify-center">
                                <div class="p-4 w-full rounded flex items-center justify-center" id="chart-receitas"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Spending chart -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-5 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Despesas Mensais</h3>
                        </div>
                        <div class="p-5">
                            <div class="h-90 bg-gray-100 rounded flex items-center justify-center">
                                <div class="p-4 w-full rounded flex items-center justify-center" id="chart-despesas"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent transactions -->
                <div class="mt-8">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-5 py-4 border-b border-gray-200 flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Transações recentes</h3>
                            <a href="#" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">Ver Todos</a>
                        </div>
                        <div class="p-5">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Data</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantia</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 2, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Coffee Shop</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Food & Drink</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-$4.50</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Apr 1, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Salary Deposit</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Income</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">+$3,200.00</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 31, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Grocery Store</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Groceries</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-$85.25</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 30, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Monthly Rent</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Housing</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-$1,200.00</td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mar 29, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Online Shopping</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">Shopping</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600">-$49.99</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Transaction Modal -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-xl mx-4">
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Nova Transação</h2>
                <p class="text-gray-500 mb-6">Adicione uma nova transação de receita ou despesa à sua conta.</p>

                <form>
                    <!-- Type Selection -->
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:gap-4">
                        <!-- Tipo -->
                        <div class="w-full sm:w-1/2">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Tipo</label>
                            <select name="type" id="type" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                                <option value="expense">Despesa</option>
                                <option value="income">Renda</option>
                            </select>
                        </div>

                        <!-- Quantia -->
                        <div class="w-full sm:w-1/2">
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Quantia</label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="amount" id="amount" class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" placeholder="0.00">
                            </div>
                        </div>
                    </div>


                    <!-- Category -->
                    <div class="mb-6">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                        <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            <option value="outros" selected>Outros</option>
                            <option value="comida">Comida</option>
                            <option value="transporte">Transporte</option>
                            <option value="habitacao">Habitação</option>
                            <option value="entreterimento">Entreterimento</option>
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mb-6">
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Data</label>
                        <input type="date" id="date" name="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" value="2025-04-04">
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 resize-none" placeholder="Digite a descrição"></textarea>
                    </div>


                    <!-- Buttons -->
                    <div class="flex justify-end gap-3">
                        <button type="button" id="cancelModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancelar
                        </button>
                        <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap gap-1 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-«r7»" data-state="closed">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                            </svg>

                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Modal functionality
        const modal = document.getElementById('transactionModal');
        const openModalBtn = document.getElementById('openModal'); // Você precisa ter um botão com id="openModal" em seu HTML
        const cancelModalBtn = document.getElementById('cancelModal');

        // Abrir modal
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Fechar modal com botão Cancel
        cancelModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Fechar modal ao clicar fora
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Fechar modal com Esc
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
            }
        });


        /* Apex Charts Receitas */
        var options = {
            series: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            fill: {
                colors: ['#15a349']
            },
            xaxis: {
                categories: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Otb", "Nov", "Dez"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: true,
                    formatter: function(val) {
                        return val + "%";
                    }
                }

            },
            title: {
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-receitas"), options);
        chart.render();


        /* Apex Charts Despesa */
        var options = {
            series: [{
                name: 'Inflation',
                data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
            }],
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },

            xaxis: {
                categories: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Otb", "Nov", "Dez"],
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                }
            },
            yaxis: {
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val + "%";
                    }
                }

            },
            title: {
                floating: true,
                offsetY: 330,
                align: 'center',
                style: {
                    color: '#444'
                }
            },
            colors: ["#db2525"]
        };

        var chart = new ApexCharts(document.querySelector("#chart-despesas"), options);
        chart.render();
    </script>
</body>

</html>