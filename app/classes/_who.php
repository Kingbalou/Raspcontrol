<?php
class usersLoggedIn{
	function getusersLoggedIn() {

	$whoUsersType = shell_exec("w | grep -E \"`users | sed 's/ /\|/g'`\"");	
	$whoUsersFormatted = str_replace(" ", " &middot ", $whoUsersType);
	?>

	
	
	<div class="userIcon">
		  	<img src='app/images/user.png' align='middle'>
		  </div> 
		  
		  <div class="userTitle">
		  	Active Users
		  </div>
		  
		  <div class="userText">
		  	<div style="width: 500px">
		  	<?php if($whoUsersFormatted == ""){
		  		echo "<strong>No users logged in</strong>";
		  	}else{
		  		$s = "";
				
				//Split lines into individual array elements
				$lines = explode ("\n", $whoUsersType);
				foreach ($lines as $line)
				{
					//Replace multiple spaces with single space
					$line = preg_replace("/ +/", " ", $line);

					if (strlen($line)>0)
					{

						//Now split fields into multiple values
						$fields = explode(" ", $line);
					
						$s .= "<div style='float: left; padding-bottom: 30px; padding-right: 20px;'><strong>User:</strong> " . $fields[0] . "<br />";
						$s .= "<strong>TTY:</strong> " . $fields[1] . "<br />";
						$s .= "<strong>From:</strong> " . $fields[2] . "<br />";
						$s .= "<strong>Login @:</strong> " . $fields[3] . "</div>";

						$s .= "";
					}
				}
				echo $s;
		  	}
			?>
		  	</div>		  	
		  </div>
	
	<div style="clear:both"></div>
	
	
<?php
}
}

?>
