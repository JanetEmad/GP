<?php

$title = "Report Pet";

use App\Http\Requests\Validation;
use App\Database\Models\Petreport;

include "layouts/header.php";
include "layouts/navbarRegistered.php";
include "App/Http/Middlewares/Auth.php";

$validation = new Validation;

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST) {

  $validation->setOldValues($_POST);

  $validation->setInputValue($_POST['date'] ?? "")->setInputValueName('Date')->required();

  $validation->setInputValue($_POST['location'] ?? "")->setInputValueName('Location')->required();

  $validation->setInputValue($_POST['situation_desc'] ?? "")->setInputValueName('situation description')->required();

  if (empty($validation->getErrors())) {

    $report = new Petreport;

    $report->setDate($_POST['date'])
      ->setLocation($_POST['location'])
      ->setSituation_description($_POST['situation_desc']);

    if ($report->create()) {
      header('location:reportsPage.php');
    } else {
      $error = "<div class='alert alert-danger' > Something went wrong </div>";
    }
  }
}
?>

<div class="reportpet-page repo">
  <div class="form form3">
    <div class="reportpet">
      <div class="reportpet-header">
        <h3 class="header2" style="text-align:center;">Pet Report</h3>
      </div>
    </div>
    <?= $error ?? "" ?>
    <form class="reportpet-form2" method="post">

      <label>date*</label>
      <input type="date" name="date" value="<?= $validation->getOldValue('date') ?>">
      <small><?= $validation->getMessage('Date') ?></small>

      <label>Location*</label>
      <input class="i2" type="text" placeholder="Enter The Location Of The Pet..." name="location" value="<?= $validation->getOldValue('location') ?>" />
      <small><?= $validation->getMessage('Location') ?></small>

      <label>Situation Description*</label>
      <input class="s3" id="Situation" type="text" style="border-color: #E17E77;" name="situation_desc" value="<?= $validation->getOldValue('situation_desc') ?>" />
      <small><?= $validation->getMessage('situation description') ?></small>

      <button class="b2">Report</button>
    </form>
  </div>
</div>