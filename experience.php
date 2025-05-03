<?php

	include("inc/database.php");
	include("inc/functions.php"); /* functions public view */
	include("inc/functions-general.php");
	
    $all_experience = get_experience("all");

    $experience_list = "";
        foreach($all_experience as $experience){

            $experience_list .= "

                                 <div class='card";
            $experience_list .=  ($experience['end_date'] == '0000-00-00') ? " current-experience" : "";
            
            $experience_list .= "'>
                                    <div class='card-header'> ";

            if (is_file('images/' . $experience['company_logo'])) {
            $experience_list .= "  <img src='images/$experience[company_logo]' alt='$experience[company_logo]'>";
            }else{
                $experience_list .= " <img src='images/default-logo.jpg' width='50'>";
            }

            $end_date = ($experience['end_date'] == '0000-00-00') ? "Present" : $experience['end_date'];

            $start_date = new DateTime($experience['start_date']);
            $current_date = new DateTime(); // today's date
            
            // Use DateTime object for end date if it exists
            $end_date_obj = ($experience['end_date'] == '0000-00-00') ? $current_date : new DateTime($experience['end_date']);
            $job_tenure = $start_date->diff($end_date_obj);
            
            // Format tenure
            $formatted_tenure = $job_tenure->format('%y years and %m months');
            
            $experience_list .=  "
                <span class='company-name'>{$experience['company']}</span>
            </div>
            <div class='card-content'>
                <h3>{$experience['job_title']}</h3>
                <h4><span>· {$experience['job_type']} </span></h4>
                <p class='duration'>{$experience['start_date']} - $end_date · $formatted_tenure</p>
                <p class='location'>Lahore, Punjab, Pakistan</p>
                <p class='description'>
                Enhanced design capabilities using advanced visualization tools like Lumion while actively contributing to on‑site architectural projects.
                </p>
            </div>
            </div>
            ";
            

        }

?>


<div id="experience" class="section experience-section">
    <div class="container">
      <h2 class="section-title">Experience</h2>
      <div class="experience-cards">

      <?php echo $experience_list ?>

      </div>
    </div>
</div>