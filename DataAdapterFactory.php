<?php
include 'OpenGisAdapter.php';

class DataAdapterFactory
{
    /**
     * return the adapted data in an array (chosen fields only)
     *
     * @param string city
     *
     * @return array | string OpenGisAdapter
     */
    public function getAdapter($city){
        return new OpenGisAdapter();
    }

}