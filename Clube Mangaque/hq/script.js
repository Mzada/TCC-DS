document.addEventListener("DOMContentLoaded", () => {
    const searchBox = document.querySelector(".search-box");


    searchBox.addEventListener("input", () => {
        const termo = searchBox.value.toLowerCase();


        const cards = document.querySelectorAll(".hq");
        if (cards.length > 0) {
            cards.forEach(card => {
                const titulo = card.querySelector("span")?.textContent.toLowerCase() || "";
                card.style.display = titulo.includes(termo) ? "block" : "none";
            });
        }
    });
});
