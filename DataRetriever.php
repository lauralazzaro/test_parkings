<?php
class DataRetriever {
    private $dataUrl;

    public function __construct($url){
        $this->dataUrl = $url;
    }

    /**
     * return the xml the object from a given url
     *
     * @return xml
     */
    public function getRawData(){
        return file_get_contents($this->dataUrl);
    }
}
