export default function setupCurrencyFormatter() {
    const currencyInputs = document.querySelectorAll("[decimal-currency-input]");

    currencyInputs.forEach((input) => {
        const hiddenInputName = input.name.replace('_formatted', '');
        const form = input.closest("form");
        const hiddenInput = form?.querySelector(`input[name="${hiddenInputName}"]`);

        input.addEventListener("input", function (e) {
            // Remove tudo que não for número
            let raw = e.target.value.replace(/\D/g, "");

            // Garante que ao menos 3 dígitos para forçar 0.02 se for digitado só "2"
            while (raw.length < 3) {
                raw = "0" + raw;
            }

            const value = parseInt(raw) / 100;

            const formattedValue = value.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            e.target.value = formattedValue;

            const numericValue = value.toFixed(2);

            if (hiddenInput) {
                hiddenInput.value = numericValue;
            }
        });

        // Inicializa o input formatado e o hidden com valores válidos
        if (input.value && hiddenInput) {
            const numericValue = parseFloat(
                input.value.replace(/[^\d,.-]/g, "").replace(",", ".")
            ) || 0;

            input.value = numericValue.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            hiddenInput.value = numericValue.toFixed(2);
        }
    });
}
