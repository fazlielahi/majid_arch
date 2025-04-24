<?php
  session_start();
  include("inc/database.php");
  include("inc/functions.php");

  
  $services_category = getservices_categ("all");
  $categories_list = "";
  foreach ($services_category as $category) {

    $categories_list .= "<a href='services.php?id=" . $category['id'] . "' class='tab-btn services-btn' data-tab='architecture design'>$category[title]</a>";
  }


  $category_id = (isset($_GET['id'])) ? $_GET['id'] : 1;
  $service_categ = getservices_categ($category_id);
  //print_r($services);
  $service_categ_container = "";
 
    //$active = ($index === 0) ? "active" : "";
    $slug = strtolower($service_categ['title']); //die($slug);
    $service_categ_container .= "
    
                                <div id='$slug' class='tab-content active'>
                                    <div class='content-container'>";
    if (is_file('admin/images/' . $service_categ['image'])) {
     $service_categ_container .= "  <img src='admin/images/$service_categ[image]' alt='$service_categ[title]'>";
    }else{
      $service_categ_container .= "  <img src='images/default.jpg' alt='$service_categ[title]'>";
    }
      $service_categ_container .= "  <div class='text-content'>
                                        <h3>$service_categ[title]</h3>
                                        <p>
                                          $service_categ[description]
                                        </p>
                                    </div>
                                  </div>
                                ";

                              //echo $service_categ['id'];  
  $services = get_services("category_services", $service_categ['id']);
  $services_cards = "";
      foreach($services as $service){

        $services_cards .= "

                      <div class='service-card' data-service-id='1'>
                        <div class='service-icon'>";

        if (is_file('admin/images/' . $service['image'])) {
          $services_cards .= "  <img src='admin/images/$service[image]' alt='$service[title]' width='50'>";
          }else{
            $services_cards .= "<i class='fas fa-drafting-compass'></i>";
          }
          $services_cards .=  "
                        </div>
                        <h3>$service[title]</h3>
                        <p>$service[text]</p>
                      </div>
                      ";

      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required Meta -->
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Page Title -->
  <title>Our Professional Services | Mian Majid Khan Architecture</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Explore the professional architectural and design services offered by Mian Majid Khan Architecture Studio. From conceptual design to project management, discover our expertise." />
  <meta name="keywords" content="architectural services, Mian Majid Khan, conceptual design, project management, interior architecture, site supervision" />
  <meta name="author" content="Mian Majid Khan Architecture Studio" />
  <meta name="robots" content="index, follow">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.yourdomain.com/services.php">

  <!-- Favicons & Touch Icons -->
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Our Professional Services | Mian Majid Khan Architecture">
  <meta property="og:description" content="From initial concept to on-site execution, see how our architectural services bring visions to life.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.yourdomain.com/services.php">
  <meta property="og:image" content="https://www.yourdomain.com/assets/og-services.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Our Professional Services | Mian Majid Khan Architecture">
  <meta name="twitter:description" content="From concept through completion, learn about our full suite of architecture and design services.">
  <meta name="twitter:image" content="https://www.yourdomain.com/assets/twitter-services.jpg">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Architectural Design",
    "provider": {
      "@type": "Organization",
      "name": "Mian Majid Khan Architecture Studio",
      "url": "https://www.yourdomain.com",
      "logo": "https://www.yourdomain.com/assets/logo.png"
    },
    "areaServed": "SA",
    "availableChannel": {
      "@type": "ContactPoint",
      "contactType": "Customer Service",
      "telephone": "+966567132321",
      "availableLanguage": "English"
    }
  }
  </script>

  <!-- Your Original Stylesheets & Inline CSS (unchanged) -->
  <link rel="stylesheet" href="styles/header-footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/services.css">
  
</head>
<body>

  <?php include("inc/header.php") ?>

  
  <div class="services-tabs">
    <?php echo $categories_list  ?>
  </div>
  
    <?php
      // displaying services category headings
      echo $service_categ_container 
     ?>
  
  <section class='services'>
    <?php
      // displaying services
      echo $services_cards 
     ?>
    </section>
      <!-- Modal Overlay for Service Details -->
      <div id="modalOverlay" class="modal-overlay">
        <div class="modal-container">
          <span class="modal-close" id="modalClose">&times;</span>
          <div class="modal-content" id="modalContent">
            <!-- Dynamic content inserted via JS -->
          </div>
        </div>
      </div>
      
  </div>
  
  
  <footer>
    <p>&copy; 2025 Mian Majid Khan Architecture. All rights reserved.</p>
  </footer>

  <script>
document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    // Remove active class from all buttons and tab contents
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));

    // Activate the clicked button
    this.classList.add('active');
    
    // Get the associated content container
    const tabId = this.getAttribute('data-tab');
    const contentContainer = document.getElementById(tabId);

    if (contentContainer) {
      contentContainer.classList.add('active');
    } else {
      console.error(`No content container found with id: ${tabId}`);
    }
  });
});



    // Sample data for service details (can be replaced with dynamic content)
const serviceDetails = {
  1: {
    title: 'Conceptual Design',
    description: 'We begin with an in-depth consultation to capture your vision and create a unique, visionary concept that integrates modern aesthetics with functionality.'
  },
  // Add additional service details for other service IDs...
};

// Function to open the modal with the relevant details
function openModal(serviceId) {
  const details = serviceDetails[serviceId];
  if (details) {
    document.getElementById('modalContent').innerHTML = `
      <h3>${details.title}</h3>
      <p>${details.description}</p>
    `;
    document.getElementById('modalOverlay').classList.add('active');
  }
}

// Function to close the modal
function closeModal() {
  document.getElementById('modalOverlay').classList.remove('active');
}

// Event listeners for service cards
document.querySelectorAll('.service-card').forEach(card => {
  card.addEventListener('click', function() {
    const serviceId = this.getAttribute('data-service-id');
    openModal(serviceId);
  });
});

// Event listener for closing the modal
document.getElementById('modalClose').addEventListener('click', closeModal);

// Close modal if clicking outside the modal container
document.getElementById('modalOverlay').addEventListener('click', function(e) {
  if(e.target === this) {
    closeModal();
  }
});
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

</body>
</html>
