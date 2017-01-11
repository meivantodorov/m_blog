<?php
echo'
	<form name ="submit"
		  action="log_me_in.php"
		  method="POST" required>
	  <input name="email"
             type="text"
             placeholder="email" required/><br/>
	  <input name="password"
             type="password"
             placeholder="password" required /><br/>
	  <input name="login_btn"
             type="submit"
             value="Submit"/>
	</form>';
?>