<?php
	if(isset($_POST['Submit']))
	{
		if(strlen($_POST['newPass'])<8)
		{
			echo 'Password must not be less than eight (8) characters <a href="../../View/Applicant/applicantChangePassword.html">Go Back</a>';
		}
    if(strlen($_POST['newPass'])>=8)
		{
			
		
		$check = false;
		for ($i=0; $i < strlen($_POST['newPass']); $i++) { 
			if($_POST['newPass'][$i] === '@' || $_POST['newPass'][$i] === '#' || $_POST['newPass'][$i] === '$' || $_POST['newPass'][$i] === '%')
			{
				$check = true;
				break;
				
			}
		}

		if($check === false)
		{
			echo 'Password must contain at least one of the special characters (@, #, $, %) <a href="../../View/Applicant/applicantChangePassword.html">Go Back</a>';
		}
    else if($_POST['newPass']!=$_POST['retypePass']){
      echo 'New Password and retyped did not matched <a href="../../View/Applicant/applicantChangePassword.html">Go Back</a>';
    }

		else{
      
	    session_start();
			$jsonFile= fopen("../../Model/Applicant/applicantData.json","r");
		  $jsonRead= fread($jsonFile,filesize("../../Model/Applicant/applicantData.json"));

      $userValue = json_decode($jsonRead, true);

      if ( $_SESSION['password'] == $_POST['currentPass'] ) {
				
        $applicantData=[
          'name'=>$userValue ['name'], 
          'userName'=>$userValue ['userName'], 
          'email'=> $userValue ['email'],
          'password'=>$_POST['retypePass'], 
          'gender'=> $userValue ['gender'],
          'dateOfBarth'=> $userValue ['dateOfBarth'],
            ];
            $applicantDataJson= json_encode( $applicantData );
            $jsonFile1= fopen( "../../Model/Applicant/applicantData.json", "w" );
            fwrite($jsonFile1 , $applicantDataJson);
            fclose($jsonFile1);
				
				
			
				$_SESSION['password']=$_POST['newPass'];
				
				
				
        header('location: ../logout.php');
      }
      else{
        echo "Incorrect current password".'<a href="../../View/Applicant/applicantChangePassword.html"> try again</a>';
      }
      fclose($jsonFile);
		}
  }
	} 
?>