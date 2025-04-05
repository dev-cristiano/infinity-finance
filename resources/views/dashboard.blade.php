@extends('layouts.app')
@section('content')
<main class="flex-1 overflow-y-auto bg-gray-50 p-4 sm:p-6 lg:p-8">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="mt-1 text-sm text-gray-500">Bem-vindo de volta, {{ Auth::user()->name }}! Aqui está uma visão geral das suas finanças.</p>
        </div>
        <div class="relative">
            <x-modal.new-transaction  />
        </div>
    </div>
    <!-- Cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Saldo total</dt>
                            <dd class="text-lg font-semibold text-gray-900">${{ number_format($data['total'], 2, ',', '.') }}</dd>
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
                    <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-600">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Renda (este mês)</dt>
                            <dd class="text-lg font-semibold text-gray-900">${{ number_format($data['incomes'], 2, ',', '.') }}</dd>
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
                            <dd class="text-lg font-semibold text-gray-900">R${{ number_format($data['expenses'], 2, ',', '.') }}</dd>
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

    <div class="mt-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
        <!-- Gráfico de Receitas -->
        <div class="bg-white shadow rounded-lg mt-6">
            <div class="px-5 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Receitas Mensais</h3>
            </div>
            <div class="p-4">
                <div id="chart-receitas" class="min-h-[300px]"></div>
            </div>
        </div>

        <!-- Gráfico de Despesas -->
        <div class="bg-white shadow rounded-lg mt-6">
            <div class="px-5 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Despesas Mensais</h3>
            </div>
            <div class="p-4">
                <div id="chart-despesas" class="min-h-[300px]"></div>
            </div>
        </div>
    </div>

    <!-- Recent transactions -->
    <div class="mt-8">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-5 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Transações Recentes</h3>
                <a href="#" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">Ver Todos</a>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titulo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Transação</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Criação</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- dd($data) -->
                            @foreach ($data['transactions'] as $transaction)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">#</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $transaction->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $transaction->type == 1 ? 'bg-red-100' : 'bg-green-100 text-green-800' }}">{{ $transaction->type_label }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $transaction->date_formatted }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $transaction->formatted_amount }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $transaction->category_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">{{ $transaction->created_formatted }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection