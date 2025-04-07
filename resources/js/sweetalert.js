import Swal from "sweetalert2";

window.Swal = Swal;

// Função para exibir mensagem de sucesso
window.successAlert = function (message) {
    Swal.fire({
        icon: "success",
        title: "Sucesso!",
        text: message,
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
    });
};

// Função para exibir mensagem de erro
window.errorAlert = function (message) {
    Swal.fire({
        icon: "error",
        title: "Erro!",
        text: message,
    });
};

// Função para confirmação de exclusão
window.deleteConfirmation = function (formId) {
    Swal.fire({
        title: "Tem certeza?",
        text: "Esta ação não pode ser revertida!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
};
