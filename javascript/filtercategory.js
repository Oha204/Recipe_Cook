function filterByCategory() {
    var category = document.getElementById("categorySelect").value;
    var cards = document.getElementsByClassName("recipe-card");
    var resetButton = document.getElementById("resetFilterButton");
    
    for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var categoryLabel = card.getAttribute("data-category");
        
        if (category === "" || categoryLabel === category) {
            card.classList.remove("hidden");
        } else {
            card.classList.add("hidden");
        }
    }

    resetButton.style.display = category !== "" ? "inline-block" : "none";
}

function resetFilter() {
    document.getElementById("categorySelect").value = "";
    filterByCategory();
}
