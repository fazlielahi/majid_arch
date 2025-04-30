  <!-- Header -->
  <div class="header">
    <div class="logo">
      <img src="images/logo.png" alt="Logo" /> <!-- Replace with your logo -->
    </div>
    <nav class="nav-menu" id="nav-menu">
      <a href="index.php">Home</a>
      <a href="services.php">Services</a>
      <a href="#">Portfolio</a>
      <a href="cv.php">Resume</a>
      <a href="#" class="contact-btn" onclick="showContact()">Contact</a>
    </nav>
    <div class="menu-icon" onclick="toggleMenu()">☰</div>
</div>

<!-- contact -->

<div id="contactOverlay" class="contact-overlay">
  <div class="contact-container">
      <span class="close-btn" onclick="closeContact()">&times;</span>
      <h2>Contact Me</h2>

      <div class="contact-info">
          <div><i class="fas fa-phone"></i> <strong class='mx-2'>Phone: </strong>  +966567132321</div>
          <div><i class="fas fa-envelope"></i> <strong class='mx-2'>Email: </strong>  archimianmajid785@gmail.com</div>
          <div><i class="fas fa-map-marker-alt"></i> <strong class='mx-2'>Address: </strong> Main boulevard shamaisy Riyadh, Saudi Arabia</div>
          <div><i class="fas fa-university"></i> <strong class='mx-2'>Bank Account: </strong>  Alrajhi - Account No: 1234XXXXXX</div>
      </div>

      <div class="contact-form">
          <form>
              <input type="text" placeholder="Your Name" required>
              <input type="email" placeholder="Your Email" required>
              <textarea placeholder="Your Message" rows="4" required></textarea>
              <button type="submit">Send Message</button>
          </form>
      </div>

      <div class="social-icons">
          <a href="https://linkedin.com/in/fazlielahi" target="_blank"><i class="fab fa-linkedin"></i></a>
          <a href="https://github.com/" target="_blank"><i class="fab fa-github"></i></a>
          <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
      </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function toggleMenu() {
      document.getElementById("nav-menu").classList.toggle("active");
    }
</script>

<script>
  function showContact() {
      $("#contactOverlay").fadeIn(300).addClass("show");
  }

  function closeContact() {
      $("#contactOverlay").fadeOut(300).removeClass("show");
  }

  // Close when clicking outside the form
  $(document).mouseup(function(e) {
      var container = $(".contact-container");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
          closeContact();
      }
  });
</script>