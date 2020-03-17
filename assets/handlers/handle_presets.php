<?php
include('../includes/db_connection.php');
include('../classes/sounds.php');

echo "<pre>";
print_r($_GET);
echo "</pre>";





// Get all sounds
$soundsArray = array();

for ($i = 0; $i < count($_GET); $i++) {
    $getIndex = "sound_{$i}";
    if (!empty($_GET[$getIndex])) {
        array_push($soundsArray, $_GET[$getIndex]);
    }
}


echo "<pre>";
print_r($soundsArray);
echo "</pre>";

/*

Nu när vi har en array med alla sounds så kan jag ta reda på hur många gånger vi behöver get SoundsId.

*/

$sounds = new Sounds($dbh);

// Sätter in i SoundsInPresets;
$presetId = $sounds->getPresetId($_GET['preset_name']);
for ($i = 0; $i < count($soundsArray); $i++) {
    $soundsId = $sounds->getSoundsId($soundsArray[$i]);
    $sounds->insertSiP($soundsId['Id'], $presetId['Id'], "A");
}
