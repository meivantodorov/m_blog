<?php
echo'
	<form name ="submit"
		  action="login_check.php"
		  method="POST">
	  <input name="email"
             type="text"
             placeholder="email"/><br/>
	  <input name="password"
             type="password"
             placeholder="password"/><br/>
	  <input name="login_btn"
             type="submit"
             value="Submit"/>
	</form>';
?>