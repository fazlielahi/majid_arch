<?php

// Fetch the existing service details
$exp = get_experience($experience_id);

?>

    <style>
      
      form { max-width: 500px; margin: auto; }
      input, textarea { margin: 8px 0;  }
      .input{
        font-size: 16px;
      }
      button { display: block}
      img { max-width: 100px; display: block; margin-bottom: 10px; }
    </style>
 <div class="edit-form">
    
    <form action="experience.php" method="POST" enctype="multipart/form-data" id="editForm">
    <span onclick="edtClose()" class="edtCloseBtn">&times;</span>
    <h2>Edit Experience</h2>
    
        <label>Company</label>
        <input type="text" class="form-control input" name="company" value="<?php echo htmlspecialchars($exp['company']); ?>" >

        <label>Company Logo</label>
        <?php 
        
          if (is_file($dir_images . $exp['company_logo'])) {
              // If the file exists in ./images/, show it
              echo "<img src='$dir_images/$exp[company_logo]'  width='50'/>";
          } else {
              // Otherwise, fall back to a default placeholder
              echo "<img src='$dir_images/default.jpg' alt='company logo' width='50'>";
          }
        
        ?>
        <label>Change Logo</label>
        <input type="file" class="form-control input" name="companylogo">
    
        <label>Job Title</label>
        <input type="text" class="form-control input" name="job_title" value="<?php echo htmlspecialchars($exp['job_title']); ?>" >
    
        <label>Start Date</label>
        <input type="text" class="form-control input" name="start_date" value="<?php echo htmlspecialchars($exp['start_date']); ?>" >
    
        <label>End Date:</label>
        <input type="text" class="form-control input" name="end_date" value="<?php echo htmlspecialchars($exp['end_date']); ?>" >
    
        <label>Location</label>
        <input type="text" class="form-control input" name="location" value="<?php echo htmlspecialchars($exp['location']); ?>" >

        <label class="mt-2">Job Type</label>
          <select name='jobtype' class="form-control mb-2">
          <option selected disabled> Select Job Type </option>
            <option value="Onsite - Full time"> Onsite - Full time </option>
            <option value="Onsite - Part time"> Onsite - Part time </option>
            <option value="Remote - Full time"> Remote - Full time </option>
            <option value="Remote - Part time"> Remote - Part time </option>
          </select>

        <input type="hidden" name='exp_id' value="<?php echo $exp['id']; ?>">
        <input type="hidden" name='query' value="exp_update">
        
        <label>Description:</label>
        <textarea name="text" class="form-control input" rows='4' ><?php echo htmlspecialchars($exp['text']); ?></textarea>
        
        <label>Status</label> <br />
        Enable <input type="radio" name="status" value="1" <?php echo ($exp['status'] == '1') ? "checked" : ""; ?> >
        Disable <input type="radio" name="status" value="0" <?php echo ($exp['status'] == '0') ? "checked" : ""; ?> >

        <br />
        <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Update</button>
    </form>
</div>
    