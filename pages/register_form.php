<?php
echo'
	<form name ="submit"
		  action="register_check.php"
		  method="POST">
      <input name="email"
             type="text"
             placeholder="email"/><br/>
	  <input name="password"
             type="password"
             placeholder="password"/><br/>
      <input name="password_again"
             type="password"
             placeholder="password again"/><br/>
      <input name="firstname"
             type="text"
             placeholder="firstname"/><br/>
      <input name="lastname"
             type="text"
             placeholder="lastname"/><br/>
      <input name="address"
             type="text"
             placeholder="address"/><br/>
	  <input name="register_btn"
             type="submit"
             value="Submit"/>
	</form>';
?>