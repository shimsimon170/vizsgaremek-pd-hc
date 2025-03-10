document.addEventListener("DOMContentLoaded", function () {
    function jumpToTitle(searchTerm) {
        const titles = document.querySelectorAll("h1, h2, h3, h4, h5, h6, li");

        for (let title of titles) {
            if (title.textContent.toLowerCase().includes(searchTerm.toLowerCase())) {
                title.scrollIntoView({ behavior: 'smooth', block: 'start' });
                title.style.backgroundColor = "#D2B48C";
                title.style.borderRadius = "10px";
                setTimeout(() => {
                    title.style.backgroundColor = "";
                    title.style.borderRadius = "";
                }, 2000);
                return true;
            }
        }
        return false;
    }

    async function searchInOtherPages(searchTerm) {
        const pages = ["drink.php", "dessert.php", "food.php"];
        for (let page of pages) {
            try {
                const response = await fetch(page);
                if (!response.ok) continue;

                const text = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(text, "text/html");

                const titles = doc.querySelectorAll("h1, h2, h3, h4, h5, h6, li");
                for (let title of titles) {
                    if (title.textContent.toLowerCase().includes(searchTerm.toLowerCase())) {
                        window.location.href = `${page}?search=${encodeURIComponent(searchTerm)}`;
                        return;
                    }
                }
            } catch (error) {
                console.error("Error fetching", page, error);
            }
        }
        alert("No matching content found.");
    }

    document.querySelector(".d-flex").addEventListener("submit", async function (event) {
        event.preventDefault();
        const searchTerm = document.getElementById("search-input").value.trim();
        if (searchTerm) {
            const found = jumpToTitle(searchTerm);
            if (!found) {
                await searchInOtherPages(searchTerm);
            }
        }
    });

    // Auto-scroll when redirected with search parameter
    const urlParams = new URLSearchParams(window.location.search);
    const searchParam = urlParams.get("search");
    if (searchParam) {
        setTimeout(() => jumpToTitle(searchParam), 500);
    }
});
