<?php
use App\Http\Requests\Validation;
use App\Database\Models\Pet;
use App\Database\Models\User;
use App\Mail\VerificationCodeMail;
$title = "Add New Pet";

include "layouts/header.php";
include "layouts/navbarRegistered.php";


$validation = new Validation;

  if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST){

    $validation-> setOldValues($_POST);

    // $validation-> setInputValue($_POST['user'] ?? "")-> setInputValueName('user')-> required()->in(['Customer','Service provider']);

    $validation-> setInputValue($_POST['name'] ?? "")-> setInputValueName('name')-> required();

    $validation-> setInputValue($_POST['type'] ?? "")-> setInputValueName('type')-> required();

    $validation-> setInputValue($_POST['family'] ?? "")-> setInputValueName('family')-> required();
    
    $validation-> setInputValue($_POST['age'] ?? "")-> setInputValueName('age')-> required();
    
    $validation-> setInputValue($_POST['gender'] ?? "")-> setInputValueName('gender')-> required()->in(['m','f']);

    if(empty($validation->getErrors())){


        $pet = new Pet;
        
        $pet->setName($_POST['name'])
        ->setType($_POST['type'])
        ->setFamily($_POST['family'])
        ->setAge($_POST['age'])
        ->setGender($_POST['gender'])
        ->setImage($_POST['image'])
        ->setId($_SESSION['User']->id);
  
        if($pet->create()){

          $success = "<div class='alert alert-success text-center'> Pet is added successfully to your pets..</div>";
          header('refresh:3;url=customerProfleAfter copy.php');

        }else{
            $error = "<div class='alert alert-danger' > Something went wrong </div>";
        }
     }
  }

?>

<div class="login-page">
  <div class="form form2">
    <div class="login">
      <div class="login-header">
        <h3 class = "ADDNEW" style="text-align:left;">Add New Pet</h3>
      </div>
    </div>
    <?= $error ?? "" ?>
    <form class="addNewPet-form">

      <label > Name*</label>
      <input class = "i3" id="name" type="text" placeholder="Enter your Pet's name..." />  
      <label >Type*</label>
      <input class = "i3" id="type" type="text" placeholder="Enter your Pet's type..." />  

      <label for="family">Family*</label>
      <input class = "i3" id="family" type="text" placeholder="Enter your Pet's family..." />

      <label  for="age">Age*</label>
      <input class = "i3" id="age" type="text" placeholder="Enter your Pet's age..." />

      <label class="radio">Gender*</label><br>
      <label  class = "check">Male
            <input  type="radio" checked="checked" name="radio">
            <span  class="checkmark"></span>
      </label>
      <label >Female
            <input  type="radio" checked="checked" name="radio">
            <span  class="checkmark"></span>
      </label>
       <br>
      <label for="image">Upload Pet Image*</label><br>
      <input class="i3"  id="image" type="file"  placeholder="Enter your Pet's age..."/>
      <div class="addButtons">
      <button class = "newPet">Add</button>
      <button  class = "newPet"><a style="color:white; text-decoration:none; " href="customerProfile.php">Cancel</a></button>
      </div>

    </form>
  </div>
</div>
<div class="images">
  <img class="image" src="assets/img/logo/pets.png" alt="">
</div>