document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-button").forEach((button) => {
        button.addEventListener("click", function () {
            const form = this.closest("form");
            const url = form.getAttribute("data-url");
            confirmDelete(url);
        });
    });
});
