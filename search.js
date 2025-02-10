document.addEventListener("DOMContentLoaded", function () {
    function jumpToTitle(searchTerm) {
        const titles = document.querySelectorAll("h1, h2, h3, h4, h5, h6, li");

        for (let title of titles) {
            if (title.textContent.toLowerCase().includes(searchTerm.toLowerCase())) {
                title.scrollIntoView({ behavior: 'smooth', block: 'start' });
                title.style.backgroundColor = "#D2B48C";
                title.style.borderRadius = "10px"
                setTimeout(() => { 
                    title.style.backgroundColor = ""; 
                    title.style.borderRadius = "";
                }, 2000);
                break;
            }
        }
    }

    document.querySelector(".d-flex").addEventListener("submit", function (event) {
        event.preventDefault(); 
        const searchTerm = document.getElementById("search-input").value.trim();
        if (searchTerm) {
            jumpToTitle(searchTerm);
        }
    });
});
