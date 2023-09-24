  // Function to reveal the target text with randomized characters
  function revealText(targetElement, targetText, currentIndex) {
    const revealInterval = 450; // Milliseconds between letter changes
    const revealTimer = setInterval(function () {
      if (currentIndex < targetText.length) {
        const randomLetter = String.fromCharCode(
          65 + Math.floor(Math.random() * 26)
        ); // Generate a random letter (A-Z)
        targetElement.textContent = targetText.substring(0, currentIndex) + randomLetter;
        currentIndex++;

        if (currentIndex == targetText.length) {
          targetElement.textContent = targetText; // Display the correct statement
          clearInterval(revealTimer); // Stop when the last character is reached
        }
      }
    }, revealInterval);
  }

  const bannerTextElement = document.getElementById('randomizedText');
  const targetText = 'Where technology meets people'; // Your desired text
  let currentIndex = 0;

  // Reveal the text with randomized characters
  revealText(bannerTextElement, targetText, currentIndex);