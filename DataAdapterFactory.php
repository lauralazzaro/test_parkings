<?php
include 'Adapter.php';

class DataAdapterFactory
{
    /**
     * return the adapted data in an array (chosen fields only)
     *
     * @param string city
     *
     * @return array | string Adapter
     */
    public function getAdapter($city){
        return new Adapter();
    }

}