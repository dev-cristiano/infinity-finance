/**
 * Custom form validation handler
 * Replaces default HTML5 validation messages with custom styled alerts
 */
export default function setupCustomValidation() {
    // Find all forms in the document
    const forms = document.querySelectorAll("form");

    forms.forEach((form) => {
        // Override the default validation behavior
        form.addEventListener("submit", function (event) {
            // Get all form elements that can be validated
            const elements = form.querySelectorAll("input, select, textarea");
            let hasError = false;

            // Remove any existing error messages
            removeAllErrorMessages(form);

            // Check each element for validity
            elements.forEach((element) => {
                // Skip elements that don't need validation
                if (
                    !element.hasAttribute("required") &&
                    !element.hasAttribute("pattern") &&
                    !element.hasAttribute("min") &&
                    !element.hasAttribute("max") &&
                    !element.hasAttribute("minlength") &&
                    !element.hasAttribute("maxlength")
                ) {
                    return;
                }

                // Check if the element is valid
                if (!element.validity.valid) {
                    event.preventDefault(); // Prevent form submission
                    hasError = true;

                    // Show custom error message
                    showErrorMessage(element);

                    // Focus the first invalid element
                    if (
                        hasError &&
                        element ===
                            Array.from(elements).find(
                                (el) => !el.validity.valid
                            )
                    ) {
                        element.focus();
                    }
                }
            });
        });

        // Add input event listeners to clear error messages when user corrects the input
        const inputs = form.querySelectorAll("input, select, textarea");
        inputs.forEach((input) => {
            input.addEventListener("input", function () {
                if (input.validity.valid) {
                    clearErrorMessage(input);
                }
            });
        });
    });

    // Prevent the browser's default validation popup
    document.addEventListener(
        "invalid",
        (function () {
            return function (e) {
                e.preventDefault();
            };
        })(),
        true
    );
}

/**
 * Show a custom error message for an invalid form element
 */
function showErrorMessage(element) {
    // Get the error message
    let message = getValidationMessage(element);

    // Create error message element
    const errorElement = document.createElement("div");
    errorElement.className = "validation-error text-red-500 text-sm mt-1";
    errorElement.textContent = message;

    // Add error class to the input
    element.classList.add("border-red-500");

    // Insert error message after the element or its parent label/div
    const parent = element.closest(".form-group") || element.parentNode;
    parent.appendChild(errorElement);
}

/**
 * Clear the error message for a form element
 */
function clearErrorMessage(element) {
    // Remove error class from the input
    element.classList.remove("border-red-500");

    // Find and remove the error message
    const parent = element.closest(".form-group") || element.parentNode;
    const errorElement = parent.querySelector(".validation-error");
    if (errorElement) {
        parent.removeChild(errorElement);
    }
}

/**
 * Remove all error messages from a form
 */
function removeAllErrorMessages(form) {
    // Remove all error messages
    const errorElements = form.querySelectorAll(".validation-error");
    errorElements.forEach((element) => element.parentNode.removeChild(element));

    // Remove error classes from all inputs
    const inputs = form.querySelectorAll("input, select, textarea");
    inputs.forEach((input) => input.classList.remove("border-red-500"));
}

/**
 * Get the appropriate validation message based on the validation error
 */
function getValidationMessage(element) {
    // Get custom message from data attribute if available
    const customMessage = element.dataset.errorMessage;
    if (customMessage) {
        return customMessage;
    }

    // Get field name for the message
    const fieldName =
        element.dataset.fieldName ||
        element.getAttribute("placeholder") ||
        element.getAttribute("name") ||
        "Este campo";

    // Return appropriate message based on validation error
    if (element.validity.valueMissing) {
        return `${fieldName} é obrigatório.`;
    } else if (element.validity.typeMismatch) {
        if (element.type === "email") {
            return `Por favor, insira um endereço de e-mail válido.`;
        } else if (element.type === "url") {
            return `Por favor, insira uma URL válida.`;
        }
        return `Formato inválido para ${fieldName}.`;
    } else if (element.validity.patternMismatch) {
        return `Formato inválido para ${fieldName}.`;
    } else if (element.validity.tooShort) {
        return `${fieldName} deve ter pelo menos ${element.getAttribute(
            "minlength"
        )} caracteres.`;
    } else if (element.validity.tooLong) {
        return `${fieldName} deve ter no máximo ${element.getAttribute(
            "maxlength"
        )} caracteres.`;
    } else if (element.validity.rangeUnderflow) {
        return `${fieldName} deve ser maior ou igual a ${element.getAttribute(
            "min"
        )}.`;
    } else if (element.validity.rangeOverflow) {
        return `${fieldName} deve ser menor ou igual a ${element.getAttribute(
            "max"
        )}.`;
    } else if (element.validity.badInput) {
        return `Por favor, insira um valor válido para ${fieldName}.`;
    }

    return `${fieldName} é inválido.`;
}