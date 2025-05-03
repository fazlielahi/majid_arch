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
$experiences = get_experience("all_experiences");

$experiences_list = "";
$i = 1;

if (!empty($experiences)) {
  foreach ($experiences as $experience) {
    $end_date = ($experience['end_date'] == '0000-00-00') ? "<span style='font-size: 14px; color:lightgreen'> Present</span>" : $experience['end_date'];
    $experience_status = ($experience['status'] == 1) ? "<span style='font-size: 14px; color:lightgreen'> Enabled </span>" : "<span style='font-size: 14px; color:lightgray'> Disabled </span>";
    $id = $experience['id'];
    $experiences_list .= "<tr>"; 
    $experiences_list .= "<td>" . $i . "</td>";
    $experiences_list .= "<td>" . htmlspecialchars($experience['job_title']) . "</td>";
    $experiences_list .= "<td class='text-column'>" . $experience['company'] . "</td>";
    $experiences_list .= "<td class='text-column'>" . $experience['start_date'] . "</td>";
    $experiences_list .= "<td class='text-column'>" . $end_date . "</td>";
    $experiences_list .= "<td>" . $experience_status . "</td>";
    $experiences_list .= "<td class='action'>";
    $experiences_list .= "<a href='experience.php?edit_id=" . $experience['id'] . "'>
    <i class='fa-solid fa-pen-to-square fa-lg mx-4' style='color: #0d4c7d;'></i>Edit</a>";
    $experiences_list .= "<a href='#' onclick=\"openModal('delete', " . $experience['id'] . ")\"><i class='fa-solid fa-trash-can fa-lg' style='color: #5c0000;'>Delete</i></a>";

    $experiences_list .= "</td>";
    $experiences_list .= "</tr>";
    $i++;
  }
} else {

  $experiences_list .= "<tr><td colspan='5'>No experiences found.</td></tr>";
}

if (isset($_POST['query'])) {
  $action = $_POST['query']; // Get 'query' value from POST
} elseif (isset($_GET['query'])) {
  $action = $_GET['query']; // Get 'query' value from GET
} else {
  $action = "";
}

// for adding experience

if (isset($_POST['create_experience'])) {
  // Get form data
  $company = $_POST['company'];
  $job_title       = $_POST['job_title'];
  $start_date       = $_POST['start_date'];
  $end_date       = (isset($_POST['end_date']) ? $_POST['end_date'] : "");
  $location       = $_POST['location'];
  $job_type       = $_POST['job_type'];
  $text        = $_POST['text'];
  $company_logo       = ""; // default


  // Handle file upload if a file was provided
  if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] == 0) {
    $target_dir  = "images/";
    $target_file = $target_dir . basename($_FILES["company_logo"]["name"]);
    if (move_uploaded_file($_FILES["company_logo"]["tmp_name"], $target_file)) {
      $company_logo = basename($_FILES["company_logo"]["name"]);
    }
  }
  $exp_query = crud_experiences($action, $company, $job_title, $company_logo, $location, $start_date, $end_date, $text, $status = null, $id = null);

  //var_dump($sevices_query);
  //die();
  if ($exp_query) {
    header("Location: experience.php?msg=Success: uploaded successfully"); // Redirect to experiences list page
    exit;
  } else {
    header("Location: experience.php?msg=Error: something went wrong"); // Redirect to experiences list page
  }
  // $stmt->close();
}

// for deleting the experience
if (isset($_GET['dlt_id'])) {
  $id = $_GET['dlt_id'];
  $sevices_query = crud_experiences($action, "", "", "", "", "", "", "", "", $id);
} else {
  $id = "";
  // die();
}

//edit experience 
$experience_edit_form = "";
if (!isset($_GET['edit_id'])) {
  $experience_id = "";
  $experience_edit_form = "";
} else {
  $experience_id = $_GET['edit_id'];
  $experience_edit_form .= "<div class='edit-container'>";
  $experience_edit_form .=  include("experience-edit.php");
  $experience_edit_form .= "</div>";
}

if ($action == 'exp_update') {
   // Get form data
   $exp_id = $_POST['exp_id'];
   $exp = get_experience($exp_id);
   $company = $_POST['company'];
   $status = $_POST['status'];
   $job_title       = $_POST['job_title'];
   $start_date       = $_POST['start_date'];
   $end_date       = (isset($_POST['end_date']) ? $_POST['end_date'] : "");
   $location       = $_POST['location'];
   $job_type = (isset($_POST['jobtype'])) ? $_POST['jobtype']: $exp['job_type'];
   $text        = $_POST['text'];
  $companylogo       = $experience['companylogo']; // Keep the current image by default

  // If a new image is uploaded, update it
  if (isset($_FILES['companylogo']) && $_FILES['companylogo']['error'] == 0) {
    $target_dir  = $dir_images;
    $target_file = $target_dir . basename($_FILES["companylogo"]["name"]);
    if (move_uploaded_file($_FILES["companylogo"]["tmp_name"], $target_file)) {
      $companylogo = basename($_FILES["companylogo"]["name"]);
    }
  }

  $exp_query = crud_experiences($action, $company, $job_title, $companylogo, $location, $start_date, $end_date, $text, $status, $exp_id);
// die(mysqli_error($conn));
  //var_dump($sevices_query);
  //die();
  if ($exp_query) {
    header("Location: experience.php?msg=Success: Updated successfully"); // Redirect to experiences list page
    exit;
  } else {
    header("Location: experience.php?msg=Error: something went wrong"); // Redirect to experiences list page
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>experiences</title>
  <link rel="stylesheet" href="styles/services.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>

    .modal-container{
      margin-top: 257px;
    }

    @media (max-width: 600px) {

      .modal-container{
        margin-top: 10px;
      }

    }
  </style>

</head>

<body>

  <!-- go back to pubic site -->
   <div class="web">
   <a href="../index.php" class='btn btn-outline-primary btn-sm web'>Back to web 🌐</a>
   <a href="logout.php" class='btn btn-outline-danger btn-sm web'>Logout </a>
   </div>

  <?php echo $experience_edit_form ?>
  <div class="container-fluid py-3" id="container">
  <div class="row">
    

    <!-- Main Content Column -->
    <div>
      <h3 class="mb-3 fw-semibold text-secondary">All experiences</h3>

      <!-- Create New experience Button -->
      <a class="btn btn-outline-success btn-sm mb-4  create-btn" onclick="openModal('create')">
        Add New experience
      </a>

      <!-- Modal Overlay -->
      <div id="modalOverlay" class="modal-overlay" style="overflow-y: scroll;">
        <div class="modal-container">
          <span class="modal-close" onclick="closeModal()">&times;</span>
          <div id="modalContent"></div>
        </div>
      </div>

      <!-- experiences Table -->
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>S.No</th>
              <th>Job Title</th>
              <th>Company</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $experiences_list; ?>
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
// alert();
      if (mode === 'create') {
        // Inline create form
        modalContent.innerHTML = `
         <h2>Add New Experience</h2>
        <form method="POST" enctype="multipart/form-data" action="experience.php">
          
          <label class="mt-2">Company</label>
          <input type="text" name="company" class="form-control mb-2" required placeholder="Enter company name">

          <label class="mt-2">Company Logo</label>
          <input type="file" name="company_logo" class="form-control mb-2">

          <label class="mt-2">Job Title</label>
          <input type="text" name="job_title" class="form-control mb-2" required placeholder="Enter job title">

          <label class="mt-2">Start Date</label>
          <input type="date" name="start_date" class="form-control mb-2" required placeholder="Start date">

          <label class="mt-2 mb-2 d-block">
            <input type="checkbox" id="toggleEndDate" onchange="toggleEndDateField()"> Currently Working
          </label>

          <label class="mt-2">End Date</label>
          <input type="date" name="end_date" class="form-control mb-2" id="endDateField" placeholder="End date">

          <label class="mt-2">Location</label>
          <input type="text" name="location" class="form-control mb-2" placeholder="City, Country">

          <input type="hidden" name="create_experience" value='1'>

          <label class="mt-2">Job Type</label>
          <select name='job_type' class="form-control mb-2">
            <option selected disabled> Select Job Type </option>
            <option value="Onsite - Full time"> Onsite - Full time </option>
            <option value="Onsite - Part time"> Onsite - Part time </option>
            <option value="Remote - Full time"> Remote - Full time </option>
            <option value="Remote - Part time"> Remote - Part time </option>
          </select>

          <label class="mt-2">Description:</label>
          <textarea name="text" class="form-control mb-2" required placeholder="Description of your experience..."></textarea>

          <input value="Add experience" name="query" class="btn btn-info my-3" type="submit">
        </form>

        `;

      } else if (mode === 'delete') {
        // Delete confirmation modal content
        modalContent.innerHTML = `
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this experience?</p>
        <div style="text-align: right; margin-top: 20px;">
            <button onclick="closeModal()" class="btn btn-outline-dark">Cancel</button>
            <a href="experience.php?dlt_id=${id}&query=delete" onclick="confirmDelete()" class="btn btn-outline-danger">Delete</a>
        </div>
        `;
      }
      document.getElementById('modalOverlay').style.display = 'flex';
    }
    
      function toggleEndDateField() {
        var checkbox = document.getElementById("toggleEndDate");
        var endDateField = document.getElementById("endDateField");

        // If checked, disable the end date input (meaning user is currently working)
        endDateField.disabled = checkbox.checked;
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
        window.location.href = "delete_experience.php?id=" + id;
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