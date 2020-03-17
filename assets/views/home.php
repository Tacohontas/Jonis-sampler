<?php
include('assets/includes/header.php')
?>
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


    <a href="index.php?page=edit">Edit</a>
    <a href="index.php?page=create">Create new</a>
    <form action="index.php?page=home" method="GET">
        <h3>Choose preset:</h3>

        <select name="preset" id="">
            <option value="1">Preset 1</option>
            <option value="2">Preset 2</option>
            <option value="3">Preset 3</option>
        </select>
        <input type="submit" value="Choose">
    </form>

</div>

<?php
include('assets/includes/footer.php')
?>