document.addEventListener("DOMContentLoaded", () => {
    const searchBox = document.querySelector(".search-box");
    let timeout;

    searchBox.addEventListener("input", () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            const termo = searchBox.value.toLowerCase();
            const cards = document.querySelectorAll(".hq");
            let hasMatches = false;

            cards.forEach(card => {
                const titulo = card.querySelector(".title")?.textContent.toLowerCase() || "";
                const descricao = card.querySelector(".desc")?.textContent.toLowerCase() || "";
                const shouldShow = titulo.includes(termo) || descricao.includes(termo);
                card.style.display = shouldShow ? "block" : "none";
                if (shouldShow) hasMatches = true;
            });

            //"Sem Resultados" mensagem
            const noResultsMsg = document.querySelector(".no-results");
            if (noResultsMsg) {
                noResultsMsg.style.display = hasMatches ? "none" : "block";
            }
        }, 300); 
    });
});