<?php

class Filestore
{
    public $filename;

    function __construct($filename)
    {
        $this->filename = $filename;    
    }

    /**
    * Returns array of lines in $this->filename
    */
    function readLines()
    {
        $contentsArray = [];

        if(filesize($this->filename) > 0){
            $handle = fopen($this->filename, 'r');
            $contents = trim(fread($handle, filesize($this->filename)));
            $contentsArray = explode(PHP_EOL, trim($contents));
            fclose($handle);
        } else{
            echo 'file has no contents' . PHP_EOL;
        }

        return $contentsArray;
    }

    /**
    * Writes each element in $array to a new line in $this->filename
    */
    function writeLines($array)
    {
          $handle = fopen($this->filename, 'w');
        foreach ($array as $item) {
            fwrite($handle, $item . PHP_EOL);
        }
        fclose($handle);
    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    function readCSV()
    {
        $handle = fopen($this->filename, 'r');

        $addressBook = [];

        while(!feof($handle)) {
            $row = fgetcsv($handle);

            if (!empty($row)) {
                $addressBook[] = $row;
            }
        }
        fclose($handle);
        return $addressBook;

    }

    /**
    * Writes contents of $array to csv $this->filename
    */
    function writeCSV($array)
    {
        $handle = fopen($this->filename, 'w');

        foreach ($array as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}