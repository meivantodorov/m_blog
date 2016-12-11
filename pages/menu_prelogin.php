<?php
echo '
 <div id="topbar">
     <div id="topnav">
         <ul>
        <li class="active"><a href="../pages/index.php">Home</a></li>
        <li><a href="../pages/login.php">Login</a></li>
        <li><a href="../pages/register.php">Register</a></li>
        <li class="last"><a href="#">Profile</a></li>
      </ul>
     </div>
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text"
                 value="Search Our Website&hellip;" onfocus="this.value=(this.value=="Search Our Website&hellip;")? "" :
                 this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
   ';
?>