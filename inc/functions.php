<?php

    function getservices_categ($id){
        global  $conn;
        $all = array();

        if($id == "all")
        {
            $services_categ_sql = "SELECT * FROM category_services WHERE status = 1";
            $services_categ_query = mysqli_query($conn, $services_categ_sql);

            while($services_categ = mysqli_fetch_assoc($services_categ_query)){
                array_push($all, $services_categ);
            }
            return $all;
        }else{
                        
            $services_categ_sql = "SELECT * FROM category_services WHERE status = 1 AND id = $id";
            $services_categ_query = mysqli_query($conn, $services_categ_sql);
            $services_categ = mysqli_fetch_assoc($services_categ_query);

            return $services_categ;
        }
    }

    function get_services($id, $category_id){
        global $conn;
        $all = array();

        if($id == "category_services"){

            $services_sql = "SELECT * FROM services WHERE category_id = $category_id AND status = 1 ORDER BY id DESC";
            $services_query = mysqli_query($conn, $services_sql);

            while($services = mysqli_fetch_assoc($services_query)){
                array_push($all, $services);
            }
            return $all;
         }else if($id == "all_services"){

            $services_sql = "SELECT * FROM services WHERE status = 1 ORDER BY id DESC";
            $services_query = mysqli_query($conn, $services_sql);

            while($services = mysqli_fetch_assoc($services_query)){
                array_push($all, $services);
            }
            return $all;

        }else{

            $services_sql = "SELECT * FROM services WHERE status = 1 AND id = $id";
            $services_query = mysqli_query($conn, $services_sql);
            $services = mysqli_fetch_assoc($services_query);

            return $services;
        }
    }


    function get_users($all, $id = null, $email = null, $password = null)
	{
		global $conn;
		$all_users = Array();
		
		if($all == "all_users")
		{
			$users_sql = "SELECT * FROM users
							WHERE status = 1
							ORDER BY id DESC";
			
			$users_query = mysqli_query($conn, $users_sql);
			
			while($users = mysqli_fetch_assoc($users_query))
			{
				array_push($all_users, $users);
			}
		
		return $all_users;
							
		}else if($all == "login_info")
		{
		
			$users_sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = 1";
			$users_query = mysqli_query($conn, $users_sql);
			
			return $users_query;
			
		}		
	}

   
	
	

?>