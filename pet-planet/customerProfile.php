<?php
$title = "Pet Planet";
include "layouts/header.php";
include "layouts/navbarRegistered.php";
include "App/Http/Middlewares/Auth.php";

use App\Database\Models\Pet;
?>
<div class="pro">
    <div class="background">
        <div class="profile">
            <?php
            if ($_SESSION['user']->image == 'default.jpg') {
                if ($_SESSION['user']->gender == 'm') {
                    $image = 'Male.jpeg';
                } else {
                    $image = 'Female.jpg';
                }
            } else {
                $image = $_SESSION['user']->image;
            }
            ?>
            <div class="pic"><img class="profilepic" style="cursor:pointer" src="assets/img/icons/<?= $image ?>" alt=""></div>
            <div class="edit"><img src="assets/img/icons/edit.png"></div>
            <h4><?= $_SESSION['user']->first_name ?> <?= $_SESSION['user']->last_name ?></h4>
            <div class="inner">
                <img class="user" src="assets/img/icons/user.png">
                <h5 class="about">About</h5>
                <h5>First Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->first_name ?></h5>
                <h5>Last Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->last_name ?></h5>
                <h5>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->gender == 'm' ? 'Male' : 'Female' ?></h5>
                <h5>Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->phone ?></h5>
                <h5>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $_SESSION['user']->email ?></h5>
            </div>
        </div>
        <div class="addpetinprofile">
            <h2 class="mypets">My Pets</h2>
            <?php
            $petObj = new Pet;
            $petObj->setUser_id($_SESSION['user']->id);
            $pets = $petObj->get()->fetch_all(MYSQLI_ASSOC);
            ?>
            <?php if (empty($pets)) { ?>
                <h3 class="yet">No Pets were added yet!</h3>
            <?php } else {
            ?>
                <div class="pets">
                    <?php foreach ($pets as $pet) { ?>
                        <div class="pet">
                            <div class="dog"><img class="dogpic" src="assets/img/pets/<?= $pet['image'] ?>"></div>
                            <h3 class="r"><?= $pet['name'] ?></h3>
                        </div>
                <?php }
                } ?>
                <input class="add" type="button" onclick="location.href='addNewPet.php'" value="Add New Pet">
                <div>
                </div>
                </div>
        </div>
    </div>
</div>