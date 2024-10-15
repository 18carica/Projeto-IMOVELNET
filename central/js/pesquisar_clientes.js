document.addEventListener("DOMContentLoaded", function () {
    const searchModal = new bootstrap.Modal(document.getElementById("searchModal"));
    const btnSearchClients = document.getElementById("btnSearchClients");
    const btnSubmitSearch = document.getElementById("btnSubmitSearch");

    // Abrir o modal de pesquisa
    btnSearchClients.addEventListener("click", function () {
        searchModal.show();
    });

    // Enviar a pesquisa
    btnSubmitSearch.addEventListener("click", function () {
        const cpf = document.getElementById("searchCpf").value;
        const name = document.getElementById("searchName").value;

        if (cpf === "" && name === "") {
            alert("Por favor, insira o CPF ou Nome para pesquisar.");
            return;
        }

        // Fazer requisição AJAX para buscar clientes
        fetch("../../sistema/clientes/pesquisar_clientes.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                cpf: documento,
                name: name,
            }),
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Exibir os resultados da pesquisa (você pode personalizar a forma de exibição)
                alert("Cliente encontrado: " + data.client.name);
            } else {
                alert("Cliente não encontrado.");
            }
        })
        .catch((error) => {
            console.error("Erro ao buscar cliente:", error);
            alert("Ocorreu um erro ao buscar o cliente.");
        });

        searchModal.hide();
    });
});
