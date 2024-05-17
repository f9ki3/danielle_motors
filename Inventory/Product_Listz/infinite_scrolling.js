let loading = false;
let currentPage = 1;

function fetchContent(page) {
  loading = true;
  document.getElementById("loading").style.display = "block";

  fetch(`api.php?page=${page}`)
    .then(response => response.json())
    .then(data => {
      loading = false;
      document.getElementById("loading").style.display = "none";
      
      const contentTR = document.getElementById("content_here"); // Updated id here
      data.forEach(item => {
        const postTR = document.createElement("tr"); // Correct the variable name here
        postTR.innerHTML = `${item.title}`; // Assuming you want to insert title in a table cell
        contentTR.appendChild(postTR);
      });
    })
    .catch(error => {
      loading = false;
      document.getElementById("loading").style.display = "none";
      console.error('Error fetching content:', error); // Log the error
    });
}

window.addEventListener("scroll", () => {
  const contentHeight = document.getElementById("content_here").clientHeight; // Updated id here
  const scrollPosition = window.innerHeight + window.scrollY;

  if (!loading && scrollPosition >= contentHeight - 200) {
    currentPage++;
    fetchContent(currentPage);
  }
});

fetchContent(currentPage);
