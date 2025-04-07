export default function setupDateFormatter() {
    const dateInputs = document.querySelectorAll("[data-date-input]");

    dateInputs.forEach((input) => {
        const hiddenInputName = `${input.name}_hidden`;
        const form = input.closest("form");
        const hiddenInput = form?.querySelector(
            `input[name="${hiddenInputName}"]`
        );

        input.addEventListener("input", function (e) {
            let value = e.target.value.replace(/\D/g, "");

            // Formatar como DD/MM/AAAA
            if (value.length > 2) {
                value = value.slice(0, 2) + "/" + value.slice(2);
            }
            if (value.length > 5) {
                value = value.slice(0, 5) + "/" + value.slice(5);
            }
            if (value.length > 10) {
                value = value.slice(0, 10);
            }

            e.target.value = value;

            // Se completo, converte para ISO
            if (value.length === 10) {
                const parts = value.split("/");
                if (parts.length === 3) {
                    const iso = `${parts[2]}-${parts[1]}-${parts[0]}`;
                    if (hiddenInput) hiddenInput.value = iso;
                }
            } else {
                if (hiddenInput) hiddenInput.value = "";
            }
        });

        // Placeholder
        if (!input.placeholder) {
            input.placeholder = "DD/MM/AAAA";
        }

        // Inicializar valor se já existe
        if (
            input.value &&
            input.value.length === 8 &&
            !input.value.includes("/")
        ) {
            const numericValue = input.value.replace(/\D/g, "");
            let formattedValue = "";

            if (numericValue.length === 8) {
                formattedValue = `${numericValue.slice(
                    0,
                    2
                )}/${numericValue.slice(2, 4)}/${numericValue.slice(4, 8)}`;
                input.value = formattedValue;

                const iso = `${numericValue.slice(4, 8)}-${numericValue.slice(
                    2,
                    4
                )}-${numericValue.slice(0, 2)}`;
                if (hiddenInput) hiddenInput.value = iso;
            }
        }
    });
}
