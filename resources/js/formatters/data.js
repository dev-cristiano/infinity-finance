/**
 * Date formatter for Brazilian format
 * Formats date inputs as the user types (DD/MM/YYYY)
 */
export default function setupDateFormatter() {
    // Find all elements with data-date-input attribute
    const dateInputs = document.querySelectorAll("[data-date-input]");

    dateInputs.forEach((input) => {
        input.addEventListener("input", function (e) {
            // Get the raw input value and remove non-numeric characters
            let value = e.target.value.replace(/\D/g, "");

            // Format as DD/MM/YYYY
            if (value.length > 0) {
                // Add first slash after day (after 2 digits)
                if (value.length > 2) {
                    value = value.substring(0, 2) + "/" + value.substring(2);
                }

                // Add second slash after month (after 5 characters including first slash)
                if (value.length > 5) {
                    value = value.substring(0, 5) + "/" + value.substring(5);
                }

                // Limit to 10 characters (DD/MM/YYYY)
                if (value.length > 10) {
                    value = value.substring(0, 10);
                }
            }

            // Update the input value
            e.target.value = value;

            // Dispatch a custom event with the formatted value
            const formattedDate = value;
            input.dispatchEvent(
                new CustomEvent("date-updated", {
                    detail: {
                        formatted: formattedDate,
                        // Also provide ISO format (YYYY-MM-DD) for backend processing
                        iso:
                            formattedDate.length === 10
                                ? formattedDate.split("/").reverse().join("-")
                                : null,
                    },
                })
            );
        });

        // Add placeholder if not present
        if (!input.placeholder) {
            input.placeholder = "DD/MM/AAAA";
        }

        // Initialize with proper formatting if there's an initial value
        if (
            input.value &&
            input.value.length > 0 &&
            !input.value.includes("/")
        ) {
            const numericValue = input.value.replace(/\D/g, "");
            let formattedValue = "";

            if (numericValue.length > 0) {
                // Format initial value
                if (numericValue.length > 2) {
                    formattedValue += numericValue.substring(0, 2) + "/";
                    if (numericValue.length > 4) {
                        formattedValue +=
                            numericValue.substring(2, 4) +
                            "/" +
                            numericValue.substring(4, 8);
                    } else {
                        formattedValue += numericValue.substring(2);
                    }
                } else {
                    formattedValue = numericValue;
                }
            }

            input.value = formattedValue;
        }
    });
}
