document.addEventListener("DOMContentLoaded", function () {
    const exploreButton = document.getElementById("explore-button");
    const content = document.querySelector(".content");
    const videoBackground = document.getElementById("video-background");

    exploreButton.addEventListener("click", function () {
        content.style.transform = "translate(-50%, -150%)";
        window.location.href = "./pages/store.php";
    });

    //blur effect when hovering over the button
    exploreButton.addEventListener("mouseenter", function () {
        videoBackground.classList.add("blurred");
    });

    // Remove blur effect when the mouse leaves the button
    exploreButton.addEventListener("mouseleave", function () {
        videoBackground.classList.remove("blurred");
    });
});
