<button id="openModal" class="inline-flex items-center justify-center gap-2 rounded-md bg-green-500 hover:bg-green-600 text-white h-10 px-4 py-2 transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M5 12h14"></path>
        <path d="M12 5v14"></path>
    </svg>
    Nova Transação
</button>

<!-- Modal (deve estar em outro componente ou no layout principal) -->
<div id="transactionModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
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
                        <select name="type" id="type" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option value="expense">Despesa</option>
                            <option value="income">Renda</option>
                        </select>
                    </div>

                    <!-- Quantia -->
                    <div class="w-full sm:w-1/2">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Quantia</label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">R$</span>
                            </div>
                            <input
                                type="number"
                                name="amount"
                                id="amount"
                                class="block w-full pl-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                placeholder="0,00"
                                step="0.01">
                        </div>
                    </div>
                </div>


                <!-- Category -->
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                    <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
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
                    <input type="date" id="date" name="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500" value="2025-04-04">
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                    <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 resize-none" placeholder="Digite a descrição"></textarea>
                </div>


                <!-- Buttons -->
                <div class="flex justify-end gap-3">
                    <button type="button" id="cancelModal" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </button>
                    <button type="submit" class="inline-flex items-center justify-center whitespace-nowrap gap-1 rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 bg-green-500 hover:bg-green-600 text-white" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-«r7»" data-state="closed">
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
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('transactionModal');
        const openModalBtn = document.getElementById('openModal');
        const cancelModalBtn = document.getElementById('cancelModal');

        if (!modal || !openModalBtn || !cancelModalBtn) {
            console.error('Elementos do modal não encontrados!');
            return;
        }

        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Bloqueia scroll
        });

        cancelModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    });
</script>