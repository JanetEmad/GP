<?php
$title = "Pet Planet";
include "layouts/header.php";
include "layouts/navbarRegistered.php";
?>
<div class="pro">
    <div class="background">
        <div class="profile">
            <div class="pic"><img class="profilepic" src="assets/img/logo/pro.jpg"></div>
            <div class="edit"><img src="assets/img/logo/edit.png"></div>
            <h4><?= $_SESSION['user']->first_name ?> <?= $_SESSION['user']->last_name ?></h4>
            <div class="inner">
                <img class="user" src="assets/img/logo/user.png">
                <h5 class="about">About</h5>
                <h5>First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->first_name ?></h5>
                <h5>Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->last_name ?></h5>
                <h5>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->gender == 'm' ? 'Male' : 'Female' ?></h5>
                <h5>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->phone ?></h5>
                <h5>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->email ?></h5>
                <h5>Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beach Creek, PA, Pennsylvania</h5>
            </div> 
        </div>
        <div  class="addpet">
            <h2 class="mypets">My Pets</h2>
            <h3 class="yet">No Pets were added yet!</h3>
            <input class="add" type="button" onclick="location.href='addNewPet.php'"  value="Add New Pet">

        <div>
    </div>
</div>