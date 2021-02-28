<?php
include 'BordeauxAdapter.php';

class DataAdapterFactory
{
    public function getAdapter($city){
        return $bordeaux = new BordeauxAdapter();
    }

}