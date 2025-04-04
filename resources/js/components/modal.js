// Modal functionality
const modal = document.getElementById("transactionModal");
const openModalBtn = document.getElementById("openModal"); // Você precisa ter um botão com id="openModal" em seu HTML
const cancelModalBtn = document.getElementById("cancelModal");

// Abrir modal
openModalBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Fechar modal com botão Cancel
cancelModalBtn.addEventListener("click", () => {
    modal.classList.add("hidden");
});

// Fechar modal ao clicar fora
modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.add("hidden");
    }
});

// Fechar modal com Esc
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) {
        modal.classList.add("hidden");
    }
});
