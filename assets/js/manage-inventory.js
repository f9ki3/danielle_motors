<script>
  document.addEventListener("DOMContentLoaded", function() {
    const checkbox = document.getElementById("checkbox-bulk-products-select");
    const select = document.getElementById("transfer-select");
    const submitBtn = document.getElementById("submit-btn");

    // Listen for checkbox change
    checkbox.addEventListener("change", function() {
      const isChecked = this.checked;
      if (isChecked) {
        // Show the select input group
        select.parentElement.classList.remove("d-none");
      } else {
        // Hide the select input group
        select.parentElement.classList.add("d-none");
        // Also hide the submit button if it's visible
        submitBtn.classList.add("d-none");
      }
    });

    // Listen for select change
    select.addEventListener("change", function() {
      const selectedOption = this.value;
      if (selectedOption !== "") {
        // Show the submit button
        submitBtn.classList.remove("d-none");
      } else {
        // Hide the submit button if no option is selected
        submitBtn.classList.add("d-none");
      }
    });
  });
</script>
