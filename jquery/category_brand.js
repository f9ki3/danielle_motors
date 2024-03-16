function filterItems() {
    var input, filter, selectBrand, selectCategory, items, option, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    selectBrand = document.getElementById("brandSelect"); // Corrected ID
    selectCategory = document.getElementById("categorySelect"); // Corrected ID
    items = [selectBrand, selectCategory];

    for (i = 0; i < items.length; i++) {
        option = items[i].options; // Use .options to get the options of the <select> element
        for (var j = 0; j < option.length; j++) {
            txtValue = option[j].textContent || option[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                option[j].style.display = "";
            } else {
                option[j].style.display = "none";
            }
        }
    }
}

// Apply Select2 to the brandSelect dropdown
$(document).ready(function() {
    $('#brandSelect').select2();
    $('#categorySelect').select2();
});