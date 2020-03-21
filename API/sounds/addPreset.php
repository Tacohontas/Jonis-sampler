<?php
include('../config/database_connection.php');
include('../object/sounds.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";

die;
// Get all sounds & keybinds
$soundsArray = array();
$keyBinds = array();


for ($i = 0; $i < count($_POST); $i++) {
    $soundIndex = "sound_{$i}";
    $keyBindIndex = "keybind_{$i}";
    if (!empty($_POST[$soundIndex])) {
        array_push($soundsArray, $_POST[$soundIndex]);
    }

    if(!empty($_POST[$keyBindIndex])){
        array_push($keyBinds, $_POST[$keyBindIndex]);
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
$sounds->insertPreset($_POST['preset_name']);

/* Upload to DB/SoundsInPresets */

// Get Id from uploaded preset (from DB).
$presetId = $sounds->getPresetId($_POST['preset_name']);

for ($i = 0; $i < count($soundsArray); $i++) {
    // Get Id from sound (in DB)
    $soundsId = $sounds->getSoundsId($soundsArray[$i]);
    // Upload to DB/SoundsInPresets
    $sounds->insertSiP($soundsId, $presetId['Id'], $keyBinds[$i]);
}
