<?php
include 'DataRetriever.php';
include 'DataAdapterFactory.php';

class ApiHandler
{
    // here you define the url data source according to the city
    const URL_BY_CITY = array('bordeaux' => 'http://data.lacub.fr/wfs?key=9Y2RU3FTE8&SERVICE=WFS&VERSION=1.1.0&REQUEST=GetFeature&TYPENAME=ST_PARK_P&SRSNAME=EPSG:4326');

    // for each new city add new url

    /**
     * @param string $city city where to search the parking
     *
     * @return array it retrieve all parking from a city
     */

    private function getAllData($city)
    {
        $dataRetriever = new DataRetriever(self::URL_BY_CITY[$city]);

        $data = $dataRetriever->getRawData();

        $dataAdapterFactory = new DataAdapterFactory();
        $adapter = $dataAdapterFactory->getAdapter($city);
        return $adaptedResponse = $adapter->adapt($data);
    }

    /**
     * @param string $city
     *
     *
     */
    public function getAllDataByCity($city)
    {
        $adaptedResponse = $this->getAllData($city);

        $jsonResponse = json_encode($adaptedResponse, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo $jsonResponse;
    }

    /**
     * @param string $city used for this test, in real case I would have accessed the position or calculate lat and lon based on selected address
     * @param float $lat latitude coordinates
     * @param float $lon longitude coordinates
     *
     * return all parking less than a selected distance, in this case I have hardcoded 3km but should be a variable to be specified by user
     */
    public function getClosestParking($city, $lat, $lon)
    {
        $adaptedResponse = $this->getAllData($city);
        $listOfCloseParking = array();
        foreach ($adaptedResponse as $parking) {
            if($this->distance($lat, $lon,$parking->latitude, $parking->longitude) <= 3){
                $listOfCloseParking[] = $parking;
            }
        }
        $jsonResponse = json_encode($listOfCloseParking, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo $jsonResponse;
    }


    /**
     * @param string $city used for this test, in real case I would have accessed the position or calculate lat and lon based on selected address
     * @param float $lat latitude coordinates
     * @param float $lon longitude coordinates
     * @param string $status chosen status to look for
     *
     * return parking with selected status
     */
    public function getParkingByStatus($city, $lat, $lon, $status)
    {
        $adaptedResponse = $this->getAllData($city);

        $listOfCloseParking = array();
        foreach ($adaptedResponse as $parking) {
            if($this->distance($lat, $lon,$parking->latitude, $parking->longitude) <= 3 && $parking->status === strtoupper($status)){
                $listOfCloseParking[] = $parking;
            }
        }

        $jsonResponse = json_encode($listOfCloseParking, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo $jsonResponse;
    }

    /**
     * @param float $lat1 latitude of the user
     * @param float $lon1 longitude of the user
     * @param float $lat2 latitude of the parking
     * @param float $lon2 longitude of the parking
     *
     * @return int|string distance from user position to the parking
     *
     */

    function distance($lat1, $lon1, $lat2, $lon2)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            return number_format($distance = ($dist * 60 * 1.1515) * 1.609344);
        }
    }

}

