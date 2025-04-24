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
        const endpoints = [
            { url: "./jsons/drinks.json", page: "drink.php" },
            { url: "./jsons/desserts.json", page: "dessert.php" },
            { url: "./jsons/food.json", page: "food.php" }
        ];

        for (let { url, page } of endpoints) {
            try {
                const response = await fetch(url);
                if (!response.ok) continue;

                const data = await response.json();

                const match = data.find(item =>
                    item.title?.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    item.name?.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    item.description?.toLowerCase().includes(searchTerm.toLowerCase())
                );

                if (match) {
                    window.location.href = `${page}?search=${encodeURIComponent(searchTerm)}`;
                    return;
                }

            } catch (error) {
                console.error("Error fetching", url, error);
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

    const urlParams = new URLSearchParams(window.location.search);
    const searchParam = urlParams.get("search");
    if (searchParam) {
        setTimeout(() => jumpToTitle(searchParam), 500);
    }
});
