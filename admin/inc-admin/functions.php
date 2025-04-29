<?php

    // 	services CRUD queries
	// -----------------------------------
	
        function crud_services($action = null, $category_id = null, $title = null, $image = null, $text = null, $status = null, $id = null)
        {
            global $conn;

            //die(var_dump($id)); 
		if($action == 'Create Service')
		{
			echo $sql = "INSERT INTO services
					SET 
					title = '$title',
					text = '$text',
					category_id = '$category_id',
					image = '$image'		
			";
			//die();
			$sevices_query = mysqli_query($conn, $sql);
			return $sevices_query;
			
		}else if($action == 'update')
		{
			$sql = "UPDATE services
					SET 
					title = '$title',
					image = '$image',
					text = '$text',
					status = '$status',
                    category_id = '$category_id'
					
					WHERE
					id = '$id'
			";
			
			$sevices_query = mysqli_query($conn, $sql);
			return $sevices_query;
			
		}else if($action == 'delete')
		{
        //    die(var_dump($id));
			 $sql = "DELETE FROM services
					
					WHERE
					id = '$id'
			";
			
			$sevices_query = mysqli_query($conn, $sql);
			return $sevices_query;
		}
	}


	// category crud

	function crud_service_categ($action = null, $category_id = null, $title = null, $image = null, $text = null, $status = null)
	{
		global $conn;

		//die(var_dump($id)); 
	if($action == 'categ_update')
	{
		$sql = "UPDATE category_services
				SET 
				title = '$title',
				image = '$image',
				description = '$text',
				status = '$status'
				
				WHERE
				id = '$category_id'
		";
		
		$sevices_query = mysqli_query($conn, $sql);
		return $sevices_query;
		
	}
}
	
	

?>