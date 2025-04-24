<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Page Title -->
  <title>CV Gallery | Mian Majid Khan Architecture Studio</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Browse and download the professional CVs of Mian Majid Khan Architecture Studio. Showcase of design and architectural expertise in a convenient gallery format." />
  <meta name="keywords" content="CV gallery, architecture CV, Mian Majid Khan, download CV, architectural resume" />
  <meta name="author" content="Mian Majid Khan Architecture Studio" />
  <meta name="robots" content="index, follow">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.yourdomain.com/cv-gallery.php">

  <!-- Favicons & Touch Icons -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <meta name="theme-color" content="#377f4a">

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="CV Gallery | Mian Majid Khan Architecture Studio">
  <meta property="og:description" content="Explore and download the CVs of our team members at Mian Majid Khan Architecture Studio." />
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.yourdomain.com/cv-gallery.php">
  <meta property="og:image" content="https://www.yourdomain.com/assets/og-cv.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="CV Gallery | Mian Majid Khan Architecture Studio">
  <meta name="twitter:description" content="Explore and download the CVs of our team members at Mian Majid Khan Architecture Studio." />
  <meta name="twitter:image" content="https://www.yourdomain.com/assets/twitter-cv.jpg">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "CV Gallery",
    "description": "A curated gallery of CVs from Mian Majid Khan Architecture Studio team members.",
    "url": "https://www.yourdomain.com/cv-gallery.php",
    "publisher": {
      "@type": "Organization",
      "name": "Mian Majid Khan Architecture Studio",
      "logo": {
        "@type": "ImageObject",
        "url": "https://www.yourdomain.com/assets/logo.png"
      }
    }
  }
  </script>

  <!-- Your Original Stylesheets (order preserved) -->
  <link rel="stylesheet" href="styles/header-footer.css">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/cv.css">
</head>
<body>

<?php include("inc/header.php") ?>

  
<div class="container">
<div class="download-btn"> <a href="images/cv.zip">Download ⬇ </a></div>
  <div class="gallery-wrapper">
    <h2>Your CV Gallery</h2>
    <div class="gallery">
      <img src="images/1.jpg" alt="">
    </div>
  </div>

  <!-- Modal -->
  <div class="modal" id="cv-modal">
    <div class="modal-content">
      <button class="close" id="close-btn">&times;</button>
      <button class="zoom-btn zoom-in" id="zoom-in-btn">+</button>
      <button class="zoom-btn zoom-out" id="zoom-out-btn">&minus;</button>
      <button class="modal-button prev" id="prev-btn">&#10094;</button>
      <img src="" id="modal-img" alt="Enlarged CV">
      <button class="modal-button next" id="next-btn">&#10095;</button>
    </div>
  </div>
  </div>

  <script>
    (function() {
      const thumbs      = document.querySelectorAll('.gallery img');
      const modal       = document.getElementById('cv-modal');
      const modalImg    = document.getElementById('modal-img');
      const prevBtn     = document.getElementById('prev-btn');
      const nextBtn     = document.getElementById('next-btn');
      const closeBtn    = document.getElementById('close-btn');
      const zoomInBtn   = document.getElementById('zoom-in-btn');
      const zoomOutBtn  = document.getElementById('zoom-out-btn');

      let currentIndex = 0;
      let scale        = 1;
      const srcList    = Array.from(thumbs).map(img => img.src);

      // Open modal
      thumbs.forEach((img, i) => img.addEventListener('click', () => {
        currentIndex = i;
        resetZoom();
        showImage();
        modal.classList.add('open');
      }));

      // Show image
      function showImage() {
        modalImg.src = srcList[currentIndex];
      }

      // Navigation handlers
      prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + srcList.length) % srcList.length;
        resetZoom(); showImage();
      });
      nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % srcList.length;
        resetZoom(); showImage();
      });

      // Zoom handlers
      zoomInBtn.addEventListener('click', () => adjustZoom(0.2));
      zoomOutBtn.addEventListener('click', () => adjustZoom(-0.2));
      modalImg.addEventListener('wheel', e => {
        e.preventDefault();
        adjustZoom(e.deltaY < 0 ? 0.1 : -0.1);
      });

      function adjustZoom(delta) {
        scale = Math.max(0.5, Math.min(3, scale + delta));
        modalImg.style.transform = `scale(${scale})`;
      }
      function resetZoom() {
        scale = 1;
        modalImg.style.transform = 'scale(1)';
      }

      // Close modal
      closeBtn.addEventListener('click', () => modal.classList.remove('open'));
      modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('open'); });

      // Keyboard support
      document.addEventListener('keydown', e => {
        if (!modal.classList.contains('open')) return;
        if (e.key === 'ArrowRight') nextBtn.click();
        if (e.key === 'ArrowLeft') prevBtn.click();
        if (e.key === 'Escape') closeBtn.click();
      });

      // Swipe support
      let startX = 0;
      modalImg.addEventListener('touchstart', e => { startX = e.changedTouches[0].clientX; });
      modalImg.addEventListener('touchend',   e => {
        const endX = e.changedTouches[0].clientX;
        if      (endX - startX > 50) prevBtn.click();
        else if (startX - endX > 50) nextBtn.click();
      });
    })();
  </script>

</body>
</html>
