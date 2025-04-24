<?php

// Fetch the existing service details
$sql = "SELECT * FROM services WHERE id = '$service_id'";
$query = mysqli_query($conn, $sql);

$service = mysqli_fetch_assoc($query);

    $category_id = $service['category_id'];
    $title       = $service['title'];
    $text        = $service['text'];
    $status      = $service['status'];
    $image       = $service['image']; 

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
    <h2>Edit Service</h2>
        <label>Category</label>
        <select name="category_id" required class="form-control">
                <option selected disabled> Select category </option>
                <?php 
                    $services_category = getservices_categ("all");
                    $categories_list = "";
                    foreach($services_category as $category){
                    
                    echo $categories_list .= "<option value='{$category['id']}' " . ($category['id'] == $service['category_id'] ? "selected" : "") . "> {$category['title']} </option>";
                    
                    }
                ?>
            </select>
        <label>Title:</label>
        <input type="text" class="form-control input" name="title" value="<?php echo htmlspecialchars($service['title']); ?>" required>
        <input type="hidden" name='service_id' value="<?php echo $service['id']; ?>">
        <input type="hidden" name='query' value="update">
        
        <label>Text:</label>
        <textarea name="text" class="form-control input" required><?php echo htmlspecialchars($service['text']); ?></textarea>
        
        <label>Image:</label>
        <?php if ($service['image']) { echo "<img src='uploads/" . htmlspecialchars($service['image']) . "' alt='Service Image'>"; } ?>
        <input type="file" class="form-control input" name="image">
        
        <label>Status</label> <br />
        Enable <input type="radio" name="status" value="1" <?php echo ($service['status'] == '1') ? "checked" : ""; ?> >
        Disable <input type="radio" name="status" value="0" <?php echo ($service['status'] == '0') ? "checked" : ""; ?> >

        <br />
        <button type="submit" class="btn btn-outline-primary btn-sm mt-3">Update Service</button>
    </form>
</div>
    