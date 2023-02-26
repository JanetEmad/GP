<?php

use App\Http\Requests\Validation;
use App\Database\Models\Pet;

$title = "Add New Pet";

include "layouts/header.php";
include "layouts/navbarRegistered.php";
include "App/Http/Middlewares/Auth.php";

$validation = new Validation;

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST) {

  $validation->setOldValues($_POST);

  $validation->setInputValue($_POST['name'] ?? "")->setInputValueName('name')->required();

  $validation->setInputValue($_POST['type'] ?? "")->setInputValueName('type')->required();

  $validation->setInputValue($_POST['family'] ?? "")->setInputValueName('family')->required();

  $validation->setInputValue($_POST['age'] ?? "")->setInputValueName('age')->required();

  $validation->setInputValue($_POST['image'] ?? "")->setInputValueName('image')->required();

  $validation->setInputValue($_POST['gender'] ?? "")->setInputValueName('gender')->required()->in(['m', 'f']);

  if (empty($validation->getErrors())) {

    $pet = new Pet;


    $pet->setName($_POST['name'])
      ->setType($_POST['type'])
      ->setFamily($_POST['family'])
      ->setAge($_POST['age'])
      ->setGender($_POST['gender'])
      ->setImage($_POST['image'])
      ->setUser_id($_SESSION['user']->id);

    if ($pet->create()) {
      $databaseResult = $pet->setImage($_POST['image'])->getPetInfo();
      $databasePet = $databaseResult->fetch_object();
      $_SESSION['pet'] = $databasePet;

      $success = "<div class='alert alert-success text-center'> Pet is added successfully to your pets..</div>";
      header('refresh:3;url=customerProfile.php');
    } else {
      $error = "<div class='alert alert-danger' > Something went wrong </div>";
    }
  }
}

?>

<div class="addpet-page">
  <div class="form form2 ">
    <div class="addpetinaddpage">
      <div class="addpet-header">
        <h3 class="ADDNEW" style="text-align:center;">Add New Pet</h3>
      </div>
    </div>
    <?= $error ?? "" ?>
    <?= $success ?? "" ?>
    <form class="addNewPet-form" method="post">

      <label> Name*</label>
      <input class="i3" id="name" type="text" placeholder="Enter your Pet's name..." name="name" value="<?= $validation->getOldValue('name') ?>" />
      <?= $validation->getMessage('name') ?>
      <label>Type*</label>
      <input class="i3" id="type" type="text" placeholder="Enter your Pet's type..." name="type" value="<?= $validation->getOldValue('type') ?>" />
      <?= $validation->getMessage('type') ?>

      <label for="family">Family*</label>
      <input class="i3" id="family" type="text" placeholder="Enter your Pet's family..." name="family" value="<?= $validation->getOldValue('family') ?>" />
      <?= $validation->getMessage('family') ?>

      <label for="age">Age*</label>
      <input class="i3" id="age" type="text" placeholder="Enter your Pet's age..." name="age" value="<?= $validation->getOldValue('age') ?>" />
      <?= $validation->getMessage('age') ?>

      <label>Gender*</label><br>
      <select name="gender" class="form-control my-2" id="">
        <option <?= $validation->getOldValue('gender') == 'm' ? 'selected' : '' ?> value="m">Male</option>
        <option <?= $validation->getOldValue('gender') == 'f' ? 'selected' : '' ?> value="f">Female</option>
      </select>
      <?= $validation->getMessage('gender') ?>
      <br>
      <label for="image">Upload Pet Image*</label><br>
      <input class="i3" id="image" name="image" type="file" placeholder="Enter your Pet's age..." name="family" value="<?= $validation->getOldValue('family') ?>" />
      <?= $validation->getMessage('image') ?>

      <div class="addButtons">
        <button class="newPet">Add</button>
        <button class="newPet"><a style="color:white; text-decoration:none; " href="customerProfile.php">Cancel</a></button>
      </div>

    </form>
  </div>
</div>
<div class="images">
  <img class="image" src="assets/img/other/pets.png" alt="">
</div>