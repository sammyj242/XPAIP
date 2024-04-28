if(is_array($_REQUEST)) {	
  	$email=$_REQUEST['email'];  // adjust based on how the info is sent
  	$firstname=$_REQUEST['firstname'];  // adjust based on how the info is sent
  	$lastname=$_REQUEST['lastname']; // adjust based on how the info is sent
  	$key="api_key";
  	$api_url="https://api.xperiencify.io/api/public/student/create/?api_key=".$key;
		
  	$ch = curl_init();
  	curl_setopt($ch, CURLOPT_URL, $api_url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	curl_setopt($ch, CURLOPT_POST, true);
  	$data = array(
    	   'student_email' => $email,
    	   'course_id' => '762611', // It will be numeric format
    	   'first_name' => $firstname,
    	   'last_name' => $lastname,
    	   'password' => '' // Optional. If not provided we'll auto-generate one and return it to you
  	);
  	
  	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  	$output = curl_exec($ch);
  	$output_array = json_decode($output, true);
  	$magic_link=$output_array['magic_link']; // this is the redirect link to take students to their course
  	header("location: ".$magic_link); // Redirect student to the course membership site home page
}
