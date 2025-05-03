<?php

    // 	services CRUD queries
	// -----------------------------------
	
        function crud_services($action = null, $category_id = null, $title = null, $image = null, $text = null, $status = null, $id = null)
        {
            global $conn;

            //die(var_dump($id)); 
		if($action == 'Create Service')
		{
			 $sql = "INSERT INTO services
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

// experiece crud

 // 	services CRUD queries
	// -----------------------------------
	
	function crud_experiences(
		$action = null,
		$company = null,
		$job_title = null,
		$company_logo = null,
		$location = null,
		$start_date = null,
		$end_date = null,
		$text = null,
		$status = null,
		$id = null
	) {
		global $conn;
	
		if ($action == 'Add experience') {
			$sql = "INSERT INTO experience SET 
				company = '$company',
				job_title = '$job_title',
				company_logo = '$company_logo',
				location = '$location',
				start_date = '$start_date',
				end_date = '$end_date',
				text = '$text'
			";
	
			$services_query = mysqli_query($conn, $sql);
			return $services_query;

		}else if($action == 'exp_update')
		{
				$sql = "UPDATE experience SET 
				company = '$company',
				job_title = '$job_title',
				company_logo = '$company_logo',
				location = '$location',
				start_date = '$start_date',
				end_date = '$end_date',
				text = '$text',
				status = '$status'
					
				WHERE
				id = '$id'
			";
			
			$sevices_query = mysqli_query($conn, $sql);
			return $sevices_query;
			
		}else if($action == 'delete')
		{
        //    die(var_dump($id));
			 $sql = "DELETE FROM experience
					
						WHERE
						id = '$id'
			";
			
			$sevices_query = mysqli_query($conn, $sql);
			return $sevices_query;
		}
	}
	
	

?>