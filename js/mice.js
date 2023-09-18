// Get the modal
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

    // Function to scroll to the top of the page
    function scrollToTop() {
      window.scrollTo({
          top: 0,
          behavior: "smooth"
      });
  }

  // Get the back-to-top button element
  let backButton = document.getElementById("back-to-top-button");

  // Adding event listener to button
  backButton.addEventListener("click", scrollToTop);

