const carousel = document.querySelector('.carousel');
    const images = carousel.getElementsByTagName('img');
    const prevButton = document.createElement('div');
    const nextButton = document.createElement('div');
    let currentIndex = 0;

    prevButton.classList.add('prev');
    nextButton.classList.add('next');
    prevButton.textContent = '<';
    nextButton.textContent = '>';

    carousel.appendChild(prevButton);
    carousel.appendChild(nextButton);

    function showImage(index) {
      for (let i = 0; i < images.length; i++) {
        images[i].style.display = 'none';
      }
      images[index].style.display = 'block';
    }

    function prevImage() {
      currentIndex--;
      if (currentIndex < 0) {
        currentIndex = images.length - 1;
      }
      showImage(currentIndex);
    }

    function nextImage() {
      currentIndex++;
      if (currentIndex >= images.length) {
        currentIndex = 0;
      }
      showImage(currentIndex);
    }

    prevButton.addEventListener('click', prevImage);
    nextButton.addEventListener('click', nextImage);

    showImage(currentIndex);