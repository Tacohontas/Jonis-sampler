<?php
include('../includes/db_connection.php');
include('../classes/sounds.php');

echo "<pre>";
print_r($_GET);
echo "</pre>";


// Get all sounds & keybinds
$soundsArray = array();
$keyBinds = array();


for ($i = 0; $i < count($_GET); $i++) {
    $soundIndex = "sound_{$i}";
    $keyBindIndex = "keybind_{$i}";
    if (!empty($_GET[$soundIndex])) {
        array_push($soundsArray, $_GET[$soundIndex]);
    }

    if(!empty($_GET[$keyBindIndex])){
        array_push($keyBinds, $_GET[$keyBindIndex]);
    }

}

echo "<pre>";
print_r($soundsArray);
echo "</pre>";

echo "<pre>";
print_r($keyBinds);
echo "</pre>";


/*
Nu när vi har en array med alla sounds & keybinds så kan jag ta reda på hur många gånger vi behöver get SoundsId.
*/

$sounds = new Sounds($dbh);

/* Upload to DB/Sounds (if sound isnt uploaded) */

/*  Upload preset to DB */
$sounds->insertPreset($_GET['preset_name']);

/* Upload to DB/SoundsInPresets */

// Get Id from uploaded preset (from DB).
$presetId = $sounds->getPresetId($_GET['preset_name']);

for ($i = 0; $i < count($soundsArray); $i++) {
    // Get Id from sound (in DB)
    $soundsId = $sounds->getSoundsId($soundsArray[$i]);
    // Upload to DB/SoundsInPresets
    $sounds->insertSiP($soundsId['Id'], $presetId['Id'], $keyBinds[$i]);
}
