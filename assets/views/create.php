<?php
include('assets/includes/header.php');
include('assets/includes/db_connection.php');
include('assets/classes/sounds.php');

$sounds = new Sounds($dbh);
echo $soundsId = $sounds->getSoundsId("boom");


?>
<h1>Create</h1>


<button class="create_btn">Create pad</button>
<a href="index.php?page=create">reset</a>


<div class="wrapper">

    <form action="assets/handlers/add_presets.php" method="POST" enctype="multipart/form-data"> 
    <div class="create_area keys">
        </div>
        <input type="text" name="preset_name" placeholder="Enter preset name..." required>
        <input type="submit" value="Create preset">
    </form>
</div>

<?php
include('assets/includes/footer.php')
?>