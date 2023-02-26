<?php
$title = "Pet Planet";
include "layouts/header.php";
include "layouts/navbarRegistered.php";
include "App/Http/Middlewares/Auth.php";

use App\Database\Models\Pet;
?>

<?php

if (isset($_GET["data"])) {
    $data = $_GET["data"];
}

$petObj = new Pet;
$pet = new Pet;
$petObj->setId($data);
$pets = $petObj->getPetInfo()->fetch_all(MYSQLI_ASSOC);
?>

<div class="pro">
    <div class="background">
        <?php foreach ($pets as $pet) { ?>
            <div class="profile">
                <div class="pic"><img class="profilepic" src="assets/img/pets/<?= $pet['image'] ?>" alt=""></div>
                <h4><?= $pet['name'] ?></h4>
                <div class="inner" style="padding-top: 30px;">
                    <h5 class="about">About</h5>
                    <h5>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pet['name'] ?></h5>
                    <h5>type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pet['type'] ?></h5>
                    <h5>family &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pet['family'] ?></h5>
                    <h5>Age &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pet['age'] ?></h5>
                    <h5>Gender &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $pet['gender'] == 'm' ? 'Male' : 'Female' ?></h5>
                </div>
            </div>
        <?php } ?>
    </div>
</div>