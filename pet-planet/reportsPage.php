<?php

use App\Database\Models\Petreport;

$title = "reports";
include "layouts/header.php";
include "layouts/navbarRegistered.php";
include "App/Http/Middlewares/Auth.php";

$report = new Petreport;
$reports = $report->read()->fetch_all(MYSQLI_ASSOC);

?>
<style>
  a,
  a:hover {
    text-decoration: none;
    color: white;
  }

  body {
    font-size: larger;
  }

  .card {
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .report_post {
    margin: 60px 360px 20px 360px;
    padding: 30px;
    padding-left: 0px;
  }

  .space {
    margin-top: 110px;
  }

  .bt_danger {
    float: right;
    margin: 30px 360px 0px 10px;
    width: 200px;
  }

  .di {
    display: inline-block;
    font-size: large;
  }

  .icon {
    width: 50px;
  }

  .sa {
    padding-left: 10px;
    font-weight: bold;
  }
</style>
<div class="bt_danger btn btn-danger "><img src="assets/img/icons/speaker.png" class="di icon"><a href="ReportPet.php" class="di sa"> Report pet</a></div>
<div class="space">
  <?php foreach ($reports as $report) { ?>
    <div class="card report_post">
      <div class="container">
        <p><b>Published at:</b> <?= $report['date'] ?></p>
        <p><b>location:</b> <?= $report['location'] ?></p>
        <p><b>description:</b> <?= $report['situation_description'] ?></p>
      </div>
    </div>
</div>
<?php } ?>
</div>