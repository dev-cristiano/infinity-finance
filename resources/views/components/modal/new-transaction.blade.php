<div class="container mx-auto p-4">
    <button id="openTransaction" class="inline-flex items-center justify-center gap-2 rounded-md bg-green-500 hover:bg-green-600 text-white h-10 px-4 py-2 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14"></path>
            <path d="M12 5v14"></path>
        </svg>
        Nova Transação
    </button>
</div>

<!-- Modal de Transação -->
<div id="transactionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-xl mx-4">
        <div class="p-6">
            <h2 class="text-xl font-bold mb-4">Nova Transação</h2>
            <p class="text-gray-500 mb-6">Adicione uma nova transação de receita ou despesa à sua conta.</p>

            <form id="transactionForm" action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <input type="text" name="user_id" value="" hidden>
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título*</label>
                    <input type="text" name="title" id="title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        placeholder="Digite o título da transação" required>
                </div>

                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:gap-4">
                    <div class="w-full sm:w-1/2">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Tipo*</label>
                        <select name="type" id="type"
                            class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                            <option value="1">Despesa</option>
                            <option value="2">Renda</option>
                        </select>
                    </div>

                    <div class="w-full sm:w-1/2">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Valor*</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">R$</span>
                            </div>
                            <input type="number" name="amount" id="amount" step="0.01"
                                class="block w-full pl-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                placeholder="0,00" required>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria*</label>
                        <button type="button" onclick="openCategoryModal()"
                            class="text-xs text-green-600 hover:text-green-500 hover:underline focus:outline-none">
                            + Cadastrar nova categoria
                        </button>
                    </div>

                    <select id="category_id" name="category_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="" selected>Selecione uma categoria</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <p class="mt-1 text-xs text-gray-500">
                        Não encontrou a categoria desejada? Clique no botão acima para cadastrar uma nova.
                    </p>
                </div>

                <div class="mb-6">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Data*</label>
                    <input type="date" id="date" name="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                        value="{{ now()->format('Y-m-d') }}">
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none"
                        placeholder="Digite a descrição"></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeTransactionModal()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="inline-flex items-center justify-center whitespace-nowrap gap-1 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z"
                                clip-rule="evenodd" />
                        </svg>
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Categoria -->
<div id="categoryModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4" onclick="event.stopPropagation()">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Cadastrar Nova Categoria</h3>

            <form id="categoryForm" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                <div class="mb-4">
                    <label for="newCategoryName" class="block text-sm font-medium text-gray-700 mb-1">Nome da Categoria*</label>
                    <input type="text" id="newCategoryName" name="name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeCategoryModal()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Controle do Modal de Transação
    const transactionModal = document.getElementById('transactionModal');
    const openTransactionBtn = document.getElementById('openTransaction');

    function openTransactionModal() {
        transactionModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeTransactionModal() {
        transactionModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Controle do Modal de Categoria
    const categoryModal = document.getElementById('categoryModal');

    function openCategoryModal() {
        categoryModal.classList.remove('hidden');
    }

    function closeCategoryModal() {
        categoryModal.classList.add('hidden');
    }

    // Event Listeners
    if (openTransactionBtn) {
        openTransactionBtn.addEventListener('click', openTransactionModal);
    }

    // Fechar modais ao clicar fora
    transactionModal.addEventListener('click', (e) => {
        if (e.target === transactionModal) {
            closeTransactionModal();
        }
    });

    categoryModal.addEventListener('click', (e) => {
        if (e.target === categoryModal) {
            closeCategoryModal();
        }
    });

    // Fechar com ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (!categoryModal.classList.contains('hidden')) {
                closeCategoryModal();
            } else if (!transactionModal.classList.contains('hidden')) {
                closeTransactionModal();
            }
        }
    });

    // AJAX para o formulário de categoria
    document.querySelector("#categoryForm").addEventListener("submit", function(event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Accept": "application/json",
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.id) {
                    const select = document.getElementById("category_id");
                    const option = new Option(data.name, data.id);
                    select.add(option);
                    select.value = data.id;

                    closeCategoryModal();
                    form.reset();
                } else {
                    alert("Erro ao cadastrar categoria.");
                }
            })
            .catch(error => console.error("Erro:", error));
    });
</script>