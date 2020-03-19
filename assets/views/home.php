<?php
include('assets/includes/header.php')
?>
<div class="wrapper">


    <div class="keys">
        <?php
        include("assets/includes/db_connection.php");
        include("assets/classes/sounds.php");

        $sounds = new Sounds($dbh);

        // Fetch the drum pads from preset
        if (!empty($_GET["preset"])) {
            $presetId = $_GET["preset"];
        } else {
            // Load default preset.
            $presetId = 1;
        }

        foreach ($sounds->fetchPreset($presetId) as $preset) {
            include('assets/includes/drum_pad.php');
        }
        ?>
    </div>


    <a href="index.php?page=edit">Edit</a>
    <a href="index.php?page=create">Create new</a>
    <form action="index.php?page=home" method="GET">
        <h3>Choose preset:</h3>

        <select name="preset" id="">
            <option value="1">Preset 1</option>
            <option value="28">Preset 28</option>
            <?php
            // FIX: fetch all presets with names etc.

            ?>
        </select>
        <input type="submit" value="Choose">
    </form>

</div>

<?php
include('assets/includes/footer.php')
?>