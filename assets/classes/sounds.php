<?php

class Sounds
{
    private $dbh;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function fetchPreset($presetId)
    {

        $query_string = "SELECT PresetsId, Keyname, FileURL, Sounds.Name FROM SoundsInPresets JOIN Presets ON PresetsId = Presets.id JOIN Sounds ON SoundsId = Sounds.Id WHERE PresetsId = $presetId;";
        // Ifall det här gick vägen så kommer den returnera ett objekt. Annars blir det false;
        $statementHandler = $this->dbh->prepare($query_string);

        if ($statementHandler !== false) {

            // $statementHandler->bindParam(":post_id", $this->post_id);
            // Executear vår query;
            $statementHandler->execute();

            // Returnerar det vi fick från execute();
            return $statementHandler->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "Could not create database statement!";
            die;
        }
    }

    public function insertPreset($presetName)
    {
        $query_string = "INSERT INTO Presets(Name, UsersId, GenresId) VALUES ('$presetName', 1, 1)";  // FIX UsersiD och GenresId skall kunnas matas in.

        $statementHandler = $this->dbh->prepare($query_string);
        if ($statementHandler !== false) {

            // $statementHandler->bindParam(":post_id", $this->post_id);
            // Executear vår query;
            $statementHandler->execute();


        } else {
            echo "Could not create database statement!";
            die;
        }
    }

    public function insertSiP($presetId, $soundId, $keyName)
    {
        $query_string = "INSERT INTO SoundsInPresets(SoundsId, PresetsId, Keyname) VALUES ($presetId, $soundId, '$keyName')";
        $statementHandler = $this->dbh->prepare($query_string);
        if ($statementHandler !== false) {

            // $statementHandler->bindParam(":post_id", $this->post_id);
            // Executear vår query;
            $statementHandler->execute();


        } else {
            echo "Could not create database statement!";
            die;
        }
    }

    public function getPresetId($presetName)
    {
        $query_string = "SELECT Id FROM Presets WHERE Name = '{$presetName}';";
        $statementHandler = $this->dbh->prepare($query_string);
        if ($statementHandler !== false) {

            // $statementHandler->bindParam(":post_id", $this->post_id);
            // Executear vår query;
            $statementHandler->execute();

            // Returnerar det vi fick från execute();
            return $statementHandler->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Could not create database statement!";
            die;
        }
    }

    public function getSoundsId($soundName)
    {
        $query_string = "SELECT Id FROM Sounds WHERE Name = '{$soundName}';";
        $statementHandler = $this->dbh->prepare($query_string);
        if ($statementHandler !== false) {

            // $statementHandler->bindParam(":post_id", $this->post_id);
            // Executear vår query;
            $statementHandler->execute();

            // Returnerar det vi fick från execute();
            return $statementHandler->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Could not create database statement!";
            die;
        }
    }
    public function convertToKeyName($datakey)
    {
        echo chr($datakey);
    }

    public function convertToKeyCode($keyname)
    {
        echo ord($keyname);
    }

}
