<?php
class DataRetriever {
    private $dataUrl;

    public function __construct($url){
        $this->dataUrl = $url;
    }

    public function getRawData(){
        return file_get_contents($this->dataUrl);
    }
}
