import Swal from "sweetalert2";

export function confirmDelete(url, options = {}) {
    Swal.fire({
        title: options.title || "Tem certeza?",
        text: options.text || "Essa ação não pode ser desfeita!",
        icon: options.icon || "warning",
        showCancelButton: true,
        confirmButtonColor: options.confirmButtonColor || "#38b164",
        cancelButtonColor: options.cancelButtonColor || "#e04545",
        confirmButtonText: options.confirmButtonText || "Sim, apagar!",
        cancelButtonText: options.cancelButtonText || "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(url, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                    Accept: "application/json",
                },
            })
                .then((res) => {
                    if (res.ok || res.status === 204 || res.status === 200) {
                        Swal.fire({
                            title: options.successTitle || "Apagado!",
                            text:
                                options.successText ||
                                "O registro foi excluído com sucesso.",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        return res.json().then((err) => {
                            throw new Error(
                                err.message || "Erro desconhecido ao excluir."
                            );
                        });
                    }
                })
                .catch((error) => {
                    console.error(error);
                    Swal.fire({
                        title: "Erro!",
                        text:
                            error.message ||
                            "Não foi possível excluir o registro.",
                        icon: "error",
                    });
                });
        }
    });
}
