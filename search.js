document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.querySelector("form");
    
    searchForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent page reload
        searchItems();
    });
});

function searchItems() {
    const query = document.getElementById("search-input").value;

    fetch(`http://localhost:5000/search?q=${query}`)
        .then(response => response.json())
        .then(data => {
            let resultsList = document.getElementById("search-results");
            resultsList.innerHTML = ""; // Clear old results

            if (data.length === 0) {
                resultsList.innerHTML = "<li>No items found</li>";
                return;
            }

            data.forEach(item => {
                let li = document.createElement("li");
                li.textContent = item.name; // Display item name from the database
                resultsList.appendChild(li);
            });
        })
        .catch(error => console.error("Error:", error));
}
