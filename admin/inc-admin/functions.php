<?php

    function getservices_categ($id){
        global  $conn;
        $all = array();

        if($id == "all")
        {
            $services_categ_sql = "SELECT * FROM category_services";
            $services_categ_query = mysqli_query($conn, $services_categ_sql);

            while($services_categ = mysqli_fetch_assoc($services_categ_query)){
                array_push($all, $services_categ);
            }
            return $all;
        }else{
                        
            $services_categ_sql = "SELECT * FROM category_services WHERE id = $id";
            $services_categ_query = mysqli_query($conn, $services_categ_sql);
            $services_categ = mysqli_fetch_assoc($services_categ_query);

            return $services_categ;
        }
    }

    function get_services($id, $category_id){
        global $conn;
        $all = array();

        if($id == "category_services"){

            $services_sql = "SELECT * FROM services WHERE category_id = $category_id ORDER BY id DESC";
            $services_query = mysqli_query($conn, $services_sql);

            while($services = mysqli_fetch_assoc($services_query)){
                array_push($all, $services);
            }
            return $all;
         }else if($id == "all_services"){

            $services_sql = "SELECT * FROM services Order BY id DESC";
            $services_query = mysqli_query($conn, $services_sql);

            while($services = mysqli_fetch_assoc($services_query)){
                array_push($all, $services);
            }
            return $all;

        }else{

            $services_sql = "SELECT * FROM services WHERE id = $id";
            $services_query = mysqli_query($conn, $services_sql);
            $services = mysqli_fetch_assoc($services_query);

            return $services;
        }
    }


    // Authentication, to check and redirect if user is not logged in
	
	function authenticate()
	{	
		if(!isset($_SESSION['member_email']) && !isset($_COOKIE['member_id']))
		{
			redirect("admin/index.php?msg=Session Expired Please Login", "Session Expired Please Login ", "error");
		}
	}

    function get_users($all, $id = null, $email = null, $password = null)
	{
		global $conn;
		$all_users = Array();
		
		if($all == "all_users")
		{
			$users_sql = "SELECT * FROM users
							ORDER BY id DESC";
			
			$users_query = mysqli_query($conn, $users_sql);
			
			while($users = mysqli_fetch_assoc($users_query))
			{
				array_push($all_users, $users);
			}
		
		return $all_users;
							
		}else if($all == "login_info")
		{
		
			$users_sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";
			$users_query = mysqli_query($conn, $users_sql);
			
			return $users_query;
			
		}		
	}

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