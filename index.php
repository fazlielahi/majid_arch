<head>
  <!-- Basic Meta -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Header with Banner</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Mian Majid Khan Architecture Studio – innovative architectural and interior design solutions. Discover our portfolio and expertise." />
  <meta name="keywords" content="architecture, architectural design, interior design, Mian Majid Khan, banner, responsive web" />
  <meta name="author" content="Mian Majid Khan Architecture Studio" />
  <meta name="robots" content="index, follow" />

  <!-- Canonical -->
  <link rel="canonical" href="https://www.yourdomain.com/" />

  <!-- Favicons -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />

  <!-- Open Graph -->
  <meta property="og:title" content="Mian Majid Khan Architecture Studio" />
  <meta property="og:description" content="Innovative architectural and interior design solutions by Mian Majid Khan." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://www.yourdomain.com/" />
  <meta property="og:image" content="https://www.yourdomain.com/assets/og-image.jpg" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Mian Majid Khan Architecture Studio" />
  <meta name="twitter:description" content="Innovative architectural and interior design solutions by Mian Majid Khan." />
  <meta name="twitter:image" content="https://www.yourdomain.com/assets/twitter-image.jpg" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Mian Majid Khan Architecture Studio",
    "url": "https://www.yourdomain.com",
    "logo": "https://www.yourdomain.com/assets/logo.png",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+966567132321",
      "contactType": "Customer Service",
      "areaServed": "SA",
      "availableLanguage": "English"
    },
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Shamesi",
      "addressLocality": "Riyadh",
      "addressCountry": "SA"
    }
  }
  </script>

  <!-- Your Original Stylesheets & Inline CSS (unchanged) -->
  <link rel="stylesheet" href="styles/about.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body,
    html {
      width: 100%;
      height: 100%;
      scroll-behavior: smooth; /* Enable smooth scrolling */
    }
    /* Custom Scrollbar */
    /* For WebKit browsers */
    ::-webkit-scrollbar {
      width: 10px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
    /* For Firefox */
    html {
      scrollbar-width: thin;
      scrollbar-color: #888 #f1f1f1;
    }
    /* Banner */
    .banner {
      height: 100%;
      /* background-image: url('./images/banner-main-page.jpg'); Replace with your image */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      text-align: center;
    }
    .banner-text {
      margin: 0 11%;
      text-align: left;
    }
    .banner-text h4 {
      margin-left: 5px;
    }
    .banner-text .home-name {
      color: rgb(55, 199, 74);
      font-size: 70px;
      font-weight: 700;
      letter-spacing: 1px;
    }
    /* Sections */
    .section {
      padding: 100px 20px;
      min-height: 100vh;
    }
    #about {
      background-color: #f4f4f4;
      color: #333;
    }
    /* Scroll to Top Button */
    #scrollToTop {
      display: none; /* Hidden by default */
      position: fixed;
      bottom: 83px;
      right: 20px;
      z-index: 2000;
      cursor: pointer;
    }
    #scrollToTop:hover {
      background-color: #333;
    }
  </style>
  <link rel="stylesheet" href="styles/header-footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <?php include("inc/header.php") ?>

  <!-- Banner -->
  <div class="banner">
    <div class="banner-text">
      <h1 class="home-name">
        Mian Majid<span style="color: #222;"> khan</span>
      </h1>
      <h4 class="cd-headline clip home-headline">
        I'm a
        <span class="cd-words-wrapper single-headline">
          <b class="is-visible">Architect</b><b>designer</b>
        </span>
        <br>
        <a href="#about" class="about-btn">About me</a>
      </h4>
    </div>
  </div>

  <!-- About Section -->
<div id="about" class="section about-section">
    <div class="about-container">
      <div class="about-image">
        <img src="images/banner-main-page.jpg" alt="Architectural Experience">
      </div>
      <div class="about-content">
        <h2>About me</h2>
        <p>
          With over three years of hands-on experience in architectural design, my journey blends creativity with technical precision. As a full‑time Architect at AGES, I push the boundaries of design through innovative projects and on‑site execution. My tenure at Architects Inn in Lahore sharpened my skills with cutting‑edge tools like Lumion, empowering us to transform spaces into inspiring works of art. My passion for design drives us to create functional, modern, and timeless environments.
        </p>
      </div>
    </div>
  </div>
  
 <!-- Experience Section -->
<div id="experience" class="section experience-section">
    <div class="container">
      <h2 class="section-title">Experience</h2>
      <div class="experience-cards">
        <!-- Card 1 (Current Experience) -->
        <div class="card current-experience">
          <div class="card-header">
            <img src="images/ages-logo.jpg" alt="AGES Logo">
            <span class="company-name">AGES</span>
          </div>
          <div class="card-content">
            <h3>Architect</h3>
            <h4><span>· Full-time</span></h4>
            <p class="duration">Nov 2021 - Present · 3 yrs 5 mos</p>
            <p class="location">On-site</p>
            <p class="description">
              Worked as an architectural designer, blending innovation with practical on‑site design to deliver inspiring and functional projects.
            </p>
          </div>
        </div>
  
        <!-- Card 2 (Previous Experience) -->
        <div class="card">
          <div class="card-header">
            <img src="images/default-logo.jpg" alt="Architects Inn Logo">
            <span class="company-name">Architects Inn</span>
          </div>
          <div class="card-content">
            <h3>Assistant Architect</h3>
            <h4><span>· Full-time</span></h4>
            <p class="duration">Nov 2021 - Dec 2024 · 3 yrs 2 mos</p>
            <p class="location">Lahore, Punjab, Pakistan</p>
            <p class="description">
              Enhanced design capabilities using advanced visualization tools like Lumion while actively contributing to on‑site architectural projects.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Skills Section -->
<div id="skills" class="skills-section">
    <div class="container">
      <h2 class="section-title">Skills</h2>
      <div class="skills-grid">
        <div class="skill">
          <span>Architecture</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 25%">25%</div>
          </div>
        </div>
        <div class="skill">
          <span>AutoCAD</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 25%">25%</div>
          </div>
        </div>
        <div class="skill">
          <span>Interior Design</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 97%">97%</div>
          </div>
        </div>
        <div class="skill">
          <span>Design</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 66%">66%</div>
          </div>
        </div>
        <div class="skill">
          <span>3D Design</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 70%">70%</div>
          </div>
        </div>
        <div class="skill">
          <span>3D Visualization</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 25%">25%</div>
          </div>
        </div>
        <div class="skill">
          <span>3D Modeling</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 88%">88%</div>
          </div>
        </div>
        <div class="skill">
          <span>Rendering</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 67%">67%</div>
          </div>
        </div>
        <div class="skill">
          <span>Lumion</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 25%">25%</div>
          </div>
        </div>
        <div class="skill">
          <span>SketchUp</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 90%">90%</div>
          </div>
        </div>
        <div class="skill">
          <span>Revit</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 77%">77%</div>
          </div>
        </div>
        <div class="skill">
          <span>Adobe Photoshop</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 495%">49%</div>
          </div>
        </div>
        <div class="skill">
          <span>Designing</span>
          <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: 55%">55%</div>
          </div>
        </div>
      </div>
    </div>
  </div>



  

  <!-- Scroll to Top Button -->
  <i id="scrollToTop" class="fa-regular fa-circle-up fa-2xl"></i>
    <!-- Whatsapp Button -->
  <a href="https://wa.me/966567132321" class="whatsapp-box" target="_blank"> 
    <i class="fa-brands fa-whatsapp fa-xl" style="color: #fff;"></i> &nbsp;
    <span>WhatsApp</span>
  </a>
  <script>
   

    // Show the scroll to top button when user scrolls down
    window.onscroll = function () {
      let scrollBtn = document.getElementById("scrollToTop");
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollBtn.style.display = "block";
      } else {
        scrollBtn.style.display = "none";
      }
    };

    // Scroll to top function when the button is clicked
    document.getElementById("scrollToTop").addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });

    // Existing text typing animation code (if needed)
    const roles = ["Architectural Designer ", "Site Architect "];
    let currentRoleIndex = 0;
    const roleElement = document.querySelector(".cd-words-wrapper");
    let roleText = "";

    function typeText(text, element, callback) {
      let i = 0;
      const interval = setInterval(() => {
        element.textContent = text.substring(0, i);
        i++;
        if (i === text.length) {
          clearInterval(interval);
          setTimeout(callback, 500); // wait before changing the text
        }
      }, 100);
    }

    function changeRole() {
      // Start typing the current role
      typeText(roles[currentRoleIndex], roleElement, () => {
        // After typing, change to the next role
        currentRoleIndex = (currentRoleIndex + 1) % roles.length;
        setTimeout(changeRole, 500); // Wait before changing role
      });
    }

    // Initialize the animation if the role element exists
    if (roleElement) {
      changeRole();
    }
  </script>
</body>
</html>
