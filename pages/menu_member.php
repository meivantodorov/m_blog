<?php
echo '
 <div id="topbar">
     <div id="topnav">
         <ul>
             <li class="active"><a href="index.php">Home</a></li>
             <li><a href="new_post.php">New Post</a></li>
             <li><a href="profile.php">Profile</a></li>
             <li><a href="logout.php">Logout</a></li>
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