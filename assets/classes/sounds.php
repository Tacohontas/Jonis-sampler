<?php

class Sounds{
    private $dbh;

    function __construct($dbh)
    {
        $this->dbh = $dbh;
    }


    public function fetchPreset()
    {
        $query_string = "SELECT PresetsId, Datakey, FileURL FROM SoundsInPresets JOIN Presets ON PresetsId = Presets.id JOIN Sounds ON SoundsId = Sounds.Id;";
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



}