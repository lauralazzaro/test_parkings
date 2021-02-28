<?php   
include 'DataRetriever.php';
include 'DataAdapterFactory.php';

class ApiHandler {
    // here you define the url data source according to the city
    const URL_BY_CITY = array('bordeaux' => 'http://data.lacub.fr/wfs?key=9Y2RU3FTE8&SERVICE=WFS&VERSION=1.1.0&REQUEST=GetFeature&TYPENAME=ST_PARK_P&SRSNAME=EPSG:4326');

    // for each new city add new url

    public function getDataForCity($city){
        $dataRetriever = new DataRetriever(self::URL_BY_CITY[$city]);

        $data = $dataRetriever->getRawData();

        $dataAdapterFactory = new DataAdapterFactory();
        $adapter = $dataAdapterFactory->getAdapter($city);
        $adapter->adapt($data);
        }

}

