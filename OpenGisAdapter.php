<?php
include 'Parking.php';

class OpenGisAdapter
{

    public function adapt($data)
    {
        /**
         * the next 3 lines are to clean the xml object from namespace because I don't know how to properly handle namespace
         * and they were given me error when accessing the data
         */
        $cleanXml = str_replace("gml:", "", $data);
        $cleanXml = str_replace("bm:", "", $cleanXml);
        $cleanXml = str_replace("wfs:", "", $cleanXml);
        /**
         * end namespace
         */


        $allParking = array();
        $xml = simplexml_load_string($cleanXml);

        /**
         * start a cycle to retrieve only the needed fields
         */
        foreach ($xml->featureMember as $parking) {

            $posArray = preg_split("[\s]", (string)$parking->ST_PARK_P->geometry->Point->pos);

            $parkingToAdd = new Parking();

            $parkingToAdd->id = (string)$parking->ST_PARK_P->attributes();
            $parkingToAdd->name = (string)$parking->ST_PARK_P->NOM;
            $parkingToAdd->status = (string)$parking->ST_PARK_P->ETAT;
            $parkingToAdd->tarifHour = (string)$parking->ST_PARK_P->TH_HEUR;
            $parkingToAdd->latitude = floatval($posArray[0]);
            $parkingToAdd->longitude = floatval($posArray[1]);
            $parkingToAdd->address = (string)$parking->ST_PARK_P->ADRESSE;

            $allParking[] = $parkingToAdd;
        }

        return $allParking;
    }
}