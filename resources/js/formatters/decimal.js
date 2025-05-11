export default function setupCurrencyFormatter() {
    const currencyInputs = document.querySelectorAll("[decimal-currency-input]");

    currencyInputs.forEach((input) => {
        const hiddenInputName = input.name.replace('_formatted', '');
        const form = input.closest("form");
        const hiddenInput = form?.querySelector(`input[name="${hiddenInputName}"]`);

        const formatCurrency = (value) => {
            // Remove tudo que não for dígito
            const numeric = value.replace(/\D/g, "");

            // Adiciona centavos
            const cents = parseFloat(numeric) / 100;

            return {
                display: cents.toLocaleString("pt-BR", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2,
                }),
                numeric: cents.toFixed(2)
            };
        };

        input.addEventListener("input", (e) => {
            const { display, numeric } = formatCurrency(e.target.value);

            // Atualiza o valor exibido e o hidden
            e.target.value = display;
            if (hiddenInput) hiddenInput.value = numeric;
        });

        // Inicialização ao carregar o input
        if (input.value && hiddenInput) {
            const cleaned = input.value.replace(/\D/g, "");
            const value = parseFloat(cleaned) / 100;

            input.value = value.toLocaleString("pt-BR", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            hiddenInput.value = value.toFixed(2);
        }
    });
}
