/**
 * Brazilian Real (R$) currency formatter
 * Formats input values as the user types
 */
export default function setupCurrencyFormatter() {
    // Find all elements with data-currency-input attribute
    const currencyInputs = document.querySelectorAll("[decimal-currency-input]");

    currencyInputs.forEach((input) => {
        input.addEventListener("input", function (e) {
            // Get the raw input value and remove non-numeric characters
            let value = e.target.value.replace(/\D/g, "");

            // Convert to number and divide by 100 to get the decimal value
            value = (parseInt(value) || 0) / 100;

            // Format as Brazilian Real
            const formattedValue = value.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            // Update the input value
            e.target.value = formattedValue;

            // Dispatch a custom event with the numeric value for form processing
            const numericValue = value.toFixed(2);
            input.dispatchEvent(
                new CustomEvent("currency-updated", {
                    detail: { value: numericValue },
                })
            );
        });

        // Initialize with proper formatting if there's an initial value
        if (input.value) {
            const numericValue =
                parseFloat(
                    input.value.replace(/[^\d,.-]/g, "").replace(",", ".")
                ) || 0;
            input.value = numericValue.toLocaleString("pt-BR", {
                style: "currency",
                currency: "BRL",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });
        }
    });
}
