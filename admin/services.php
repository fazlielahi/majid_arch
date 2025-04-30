<?php

	//ADMIN PANEL Login PAGE

	session_start();
	include("../inc/database.php");
	include("../inc/functions.php"); /* functions public view */
	include("../inc/functions-general.php");
	$dir_images = "../images/";
	
	include("inc-admin/functions.php"); /* functions admin panel */
	
?>

<?php

$services = get_services("all_services", "");
$services_category = getservices_categ("all");
$categories_combo = "";
$categories_list = "";
foreach ($services_category as $category) {

  $categories_combo .= "<option value='$category[id]'> $category[title] </option>";
  $categories_list .= ($category['status'] == 1) ? "<p> $category[title] <a href='services.php?categ_id=$category[id]'> <i class='fa-solid fa-pen-to-square fa-sm m-1' style='color: #0d4c7d;'></i> </a></p> " : "<p style='color: lightgray'> $category[title] <a href='services.php?categ_id=$category[id]'> <i class='fa-solid fa-pen-to-square fa-sm m-1' style='color: #0d4c7d;'></i> </a></p> ";
  
  "";
}

$service_list = "";
$i = 1;

if (!empty($services)) {
  foreach ($services as $service) {
    $service_status = ($service['status'] == 1) ? "<span style='font-size: 14px; color:lightgreen'> Enabled </span>" : "<span style='font-size: 14px; color:lightgray'> Disabled </span>";
    $id = $service['id'];
    $service_list .= "<tr>"; 
    $service_list .= "<td>" . $i . "</td>";
    $service_list .= "<td>" . htmlspecialchars($service['title']) . "</td>";
    $service_list .= is_file("./images/" . htmlspecialchars($service['image']))
      ? "<td class='image-column'><img src='images/" . htmlspecialchars($service['image']) . "' width='40' height='40' alt='" . htmlspecialchars($service['title']) . "'></td>" : "<td class='image-column'><img width='40' height='auto' src='../images/default.jpg' alt='Default Image'></td>";
    $service_list .= "<td class='text-column'>" . nl2br(htmlspecialchars($service['text'])) . "</td>";
    $service_list .= "<td>" . $service_status . "</td>";
    $service_list .= "<td class='action'>";
    $service_list .= "<a href='services.php?edit_id=" . $service['id'] . "'>
    <i class='fa-solid fa-pen-to-square fa-lg mx-4' style='color: #0d4c7d;'></i></a>";
    $service_list .= "<a href='#' onclick=\"openModal('delete', " . $service['id'] . ")\"><i class='fa-solid fa-trash-can fa-lg' style='color: #5c0000;'></i></a>";

    $service_list .= "</td>";
    $service_list .= "</tr>";
    $i++;
  }
} else {

  $service_list .= "<tr><td colspan='5'>No services found.</td></tr>";
}

if (isset($_POST['query'])) {
  $action = $_POST['query']; // Get 'query' value from POST
} elseif (isset($_GET['query'])) {
  $action = $_GET['query']; // Get 'query' value from GET
} else {
  $action = "";
}


if (isset($_POST['create_service'])) {
  // Get form data
  $category_id = $_POST['category_id'];
  $title       = $_POST['title'];
  $text        = $_POST['text'];
  $image       = ""; // default


  // Handle file upload if a file was provided
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = basename($_FILES["image"]["name"]);
    }
  }
  $sevices_query = crud_services($action, $category_id, $title, $image, $text, $status = null, $id = null);

  //var_dump($sevices_query);
  //die();
  if ($sevices_query) {
    header("Location: services.php?msg=Success: uploaded successfully"); // Redirect to services list page
    exit;
  } else {
    header("Location: services.php?msg=Error: something went wrong"); // Redirect to services list page
  }
  // $stmt->close();
}

// for deleting the service
if (isset($_GET['dlt_id'])) {
  $id = $_GET['dlt_id'];
  $sevices_query = crud_services($action, "", "", "", "", "", $id);
} else {
  $id = "";
  // die();
}

//edit service 
$service_edit_form = "";
if (!isset($_GET['edit_id'])) {
  $service_id = "";
  $service_edit_form = "";
} else {
  $service_id = $_GET['edit_id'];
  $service_edit_form .= "<div class='edit-container'>";
  $service_edit_form .=  include("edit_service.php");
  $service_edit_form .= "</div>";
}

if ($action == 'update') {
  $category_id = $_POST['category_id'];
  $title       = $_POST['title'];
  $text        = $_POST['text'];
  $status      = $_POST['status'];
  $id      = $_POST['service_id'];
  $image       = $service['image']; // Keep the current image by default

  // If a new image is uploaded, update it
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = basename($_FILES["image"]["name"]);
    }
  }

  // Update record using prepared statement
  $sevices_query = crud_services($action, $category_id, $title, $image, $text, $status, $id);

  if ($sevices_query) {
    header("Location: services.php?msg=Success: updated successfully"); // Redirect to services list page
    exit;
  } else {
    header("Location: services.php?msg=Error: something went wrong"); // Redirect to services list page
  }
}

// category edit
 
$service_edit_form = "";
if (!isset($_GET['categ_id'])) {
  $categ_id = "";
  $categ_edit_form = "";
} else {
  $categ_id = $_GET['categ_id'];
  $categ_edit_form .= "<div class='edit-container'>";
  $categ_edit_form .=  include("categ-edit-service.php");
  $categ_edit_form .= "</div>";
}

if ($action == 'categ_update') {
  $title       = $_POST['title'];
  $text        = $_POST['text'];
  $status      = $_POST['status'];
  $categ_id      = $_POST['categ_id'];
  $image       = $service['image']; // Keep the current image by default

  // If a new image is uploaded, update it
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = basename($_FILES["image"]["name"]);
    }
  }

  // Update record using prepared statement
  $categ_query = crud_service_categ($action, $categ_id, $title, $image, $text, $status);

  if ($categ_query) {
    header("Location: services.php?msg=Success: updated successfully"); // Redirect to services list page
    exit;
  } else {
    header("Location: services.php?msg=Error: something went wrong"); // Redirect to services list page
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Services</title>
  <link rel="stylesheet" href="styles/services.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

  <!-- go back to pubic site -->
   <div class="web">
   <a href="../index.php" class='btn btn-outline-primary btn-sm web'>Back to web 🌐</a>
   <a href="logout.php" class='btn btn-outline-danger btn-sm web'>Logout </a>
   </div>

  <?php echo $service_edit_form ?>
  <div class="container-fluid py-3" id="container">
  <div class="row">
    
    <!-- Sidebar Column -->
    <div class="col-lg-2 col-md-3 col-sm-12 mt-2 categories-section">
      <h5 class="fw-semibold text-secondary mb-3">Categories</h5>
      <!-- Category content goes here -->
       <?php echo $categories_list ?>
       <hr>
    </div>
    <!-- Main Content Column -->
    <div class="col-lg-10 col-md-9 col-sm-12 mb-4">
      <h3 class="mb-3 fw-semibold text-secondary">All Services</h3>

      <!-- Create New Service Button -->
      <a class="btn btn-outline-success btn-sm mb-4  create-btn" onclick="openModal('create')">
        Create New Service
      </a>

      <!-- Modal Overlay -->
      <div id="modalOverlay" class="modal-overlay">
        <div class="modal-container">
          <span class="modal-close" onclick="closeModal()">&times;</span>
          <div id="modalContent"></div>
        </div>
      </div>

      <!-- Services Table -->
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>S.No</th>
              <th>Title</th>
              <th class="image-column">Image</th>
              <th class="text-column">Text</th>
              <th class="text-column">status</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $service_list; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

  <script>
    function openModal(mode, id = null) {
      var modalContent = document.getElementById('modalContent');
      modalContent.innerHTML = '';

      if (mode === 'create') {
        // Inline create form
        modalContent.innerHTML = `
          <h2>Create New Service</h2>
          <form method="POST" enctype="multipart/form-data" action="services.php">
            <label>Category</label>
            <select name="category_id" required class="form-control">
                <option selected disabled> Select category </option>
                <?php echo $categories_combo ?>
            </select>
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
            <input type="hidden" name="create_service" value='1'>
            <label>Text:</label>
            <textarea name="text" class="form-control" required></textarea>
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
            <input value="Create Service" name="query" class="btn btn-info my-3" type="submit">
          </form>
        `;

      } else if (mode === 'delete') {
        // Delete confirmation modal content
        modalContent.innerHTML = `
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this service?</p>
        <div style="text-align: right; margin-top: 20px;">
            <button onclick="closeModal()" class="btn btn-outline-dark">Cancel</button>
            <a href="services.php?dlt_id=${id}&query=delete" onclick="confirmDelete()" class="btn btn-outline-danger">Delete</a>
        </div>
        `;
      }
      document.getElementById('modalOverlay').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('modalOverlay').style.display = 'none';
    }

    function openDeleteModal(id) {
      var modal = document.getElementById("deleteModal");
      var confirmBtn = document.getElementById("confirmDeleteBtn");

      modal.style.display = "flex";
      modal.classList.add("fade-in");

      confirmBtn.onclick = function() {
        window.location.href = "delete_service.php?id=" + id;
      };
    }

    function closeDeleteModal() {
      var modal = document.getElementById("deleteModal");
      modal.classList.remove("fade-in");
      modal.classList.add("fade-out");

      setTimeout(() => {
        modal.style.display = "none";
        modal.classList.remove("fade-out");
      }, 300);
    }

    //edit modal

    const editmodal = document.querySelector(".edit-form");
    const openBtn = document.getElementById("openModalBtn");
    

    function edtClose(){
      const editmodal = document.querySelector(".edit-form");
      editmodal.style.display = "none";
      
    }

    openBtn.onclick = () => editmodal.style.display = "block";

  </script>

</body>

</html>