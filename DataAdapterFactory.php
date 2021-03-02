<?php
include 'Adapter.php';

class DataAdapterFactory
{
    /**
     *
     * @return Adapter
     *
     * in this case is set to search parking in bordeaux
     */
    public function getAdapter(){
        return new Adapter();
    }

}