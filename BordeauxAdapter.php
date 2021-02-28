<?php
include 'Parking.php';

class BordeauxAdapter
{

    public function adapt($data)
    {
        $cleanXml = str_replace("gml:","", $data);
        $cleanXml = str_replace("bm:","", $cleanXml);
        $cleanXml = str_replace("wfs:","", $cleanXml);

        $xml = simplexml_load_string($cleanXml);

        foreach ($xml->featureMember as $parking) {
            // creare array di parcheggi

            echo($parking->ST_PARK_P->NOM);
        }

        //$response = array_push();

    }
}