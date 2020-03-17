<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jonis sampler</title>
  <link rel="stylesheet" href="assets/style/style.css">
  <script src="assets/app.js" defer></script>

<body>
<div class="wrapper">


  <div class="keys">
    <?php
    include("assets/includes/db_connection.php");
    include("assets/classes/sounds.php");

    $sounds = new Sounds($dbh);

    // echo "<pre>";
    // print_r($sounds->fetchPreset());
    // echo "</pre>";

    foreach ($sounds->fetchPreset() as $preset) {
      include('assets/includes/audio_data.php');
    }
    ?>
  </div>

</div>
</body>

</html>