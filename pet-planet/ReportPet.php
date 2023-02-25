<?php

$title = "Report Pet";
include "layouts/header.php";
include "layouts/navbarRegistered.php";
?>
<div class="login-page">
  <div class="form form3">
    <div class="login">
      <div class="login-header">
        <h3 class = "header2" style="text-align:center;">Pet Report</h3>
      </div>
    </div>
    <form class="login-form2">
      <label for="location">Location*</label>
      <input class = "i2" id="Location" type="text" placeholder="Enter The Location Of The Pet..." />
      <label for="Situation">Situation Description*</label>
      <input class = "s3" id="Situation" type="text" style = "border-color: #E17E77;"/>
      <button class = "b2">Report</button>
    </form>
  </div>
</div>