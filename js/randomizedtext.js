  // Function to randomize banner heading and then appear text
  function revealText(targetElement, targetText, currentIndex) {
    const revealInterval = 90; 
    const revealTimer = setInterval(function () {
      if (currentIndex < targetText.length) {
        const randomLetter = String.fromCharCode(
          65 + Math.floor(Math.random() * 26)
        ); // Generate a random letter (A-Z)
        targetElement.textContent = targetText.substring(0, currentIndex) + randomLetter;
        currentIndex++;

        if (currentIndex == targetText.length) {
          targetElement.textContent = targetText; 
          clearInterval(revealTimer); 
        }
      }
    }, revealInterval);
  }

  const bannerTextElement = document.getElementById('randomizedText');
  const targetText = 'Where technology meets people';
  let currentIndex = 0;

  // Reveal the text with randomized characters
  revealText(bannerTextElement, targetText, currentIndex);