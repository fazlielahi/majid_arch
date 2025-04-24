<?php

// Fetch the existing service details
$categ = getservices_categ($categ_id);

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
    
    <form action="services.php" method="POST" enctype="multipart/form-data" id="editForm">
    <span class="edtCloseBtn">&times;</span>
    <h2>Edit Category</h2>
    
        <label>Title:</label>
        <input type="text" class="form-control input" name="title" value="<?php echo htmlspecialchars($categ['title']); ?>" required>
        <input type="hidden" name='categ_id' value="<?php echo $categ['id']; ?>">
        <input type="hidden" name='query' value="categ_update">
        
        <label>Description:</label>
        <textarea name="text" class="form-control input" rows='4' required><?php echo htmlspecialchars($categ['description']); ?></textarea>
        
        <label>Cover:</label>
        <?php 
        
        if (is_file('images/' . $categ['image'])) {
            // If the file exists in ./images/, show it
            echo "<img src='images/" . $categ['image']  . "' width='50'  alt='Service Image'>";
        } else {
            // Otherwise, fall back to a default placeholder
            echo "<img src='images/default.jpg' alt='Default Service Image'>";
        }
        
        ?>
        <input type="file" class="form-control input" name="image">
        
        <label>Status</label> <br />
        Enable <input type="radio" name="status" value="1" <?php echo ($categ['status'] == '1') ? "checked" : ""; ?> >
        Disable <input type="radio" name="status" value="0" <?php echo ($categ['status'] == '0') ? "checked" : ""; ?> >

        <br />
        <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Update</button>
    </form>
</div>
    