<?php
include 'Parking.php';

class BordeauxAdapter
{

    public function adapt($data)
    {
        $cleanXml = str_replace("gml:", "", $data);
        $cleanXml = str_replace("bm:", "", $cleanXml);
        $cleanXml = str_replace("wfs:", "", $cleanXml);

        $allParking = array();
        $xml = simplexml_load_string($cleanXml);

        foreach ($xml->featureMember as $parking) {
            $parkingToAdd = new Parking();

            $parkingToAdd->id = (string)$parking->ST_PARK_P->attributes();
            $parkingToAdd->name = (string)$parking->ST_PARK_P->NOM;
            $parkingToAdd->status = (string)$parking->ST_PARK_P->ETAT;
            $parkingToAdd->tarifHour = (string)$parking->ST_PARK_P->TH_HEUR;
            $parkingToAdd->latitude = (string)$parking->ST_PARK_P->geometry->Point->pos;
            $parkingToAdd->longitude = (string)$parking->ST_PARK_P->geometry->Point->pos;
            $parkingToAdd->address = (string)$parking->ST_PARK_P->ADRESSE;

            $allParking[] = ($parkingToAdd);
        }

        return $allParking;
    }
}