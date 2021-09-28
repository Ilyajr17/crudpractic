<?php

class model
{

    protected $dir;
    protected $id;


    function list()
    {
        $arrayFile = scandir($this->dir);
        $array = [];
        foreach ($arrayFile as $filename) {
            $strJson = file_get_contents($this->dir . $filename);
            $array = json_decode($strJson, true);

            $array['id'] = str_replace('.json', '', $filename);
            if ($filename === '.' || $filename === '..') {
                unset($filename);
            } else {
                $arrayJson[] = $array;
            }
        }

        return $arrayJson;
    }

    function create($corectPath, $newUserArray)
    {
        $saveJson = json_encode($newUserArray);

        $file = file_put_contents($corectPath, $saveJson);
        return $i - 1;
    }

    function open($file)
    {
        $strJson = file_get_contents($file);
        $array = json_decode($strJson, true);

        foreach ($array as $index => $name) {

            $array['id'] = $this->id;
        }
        return $array;
    }

    function save($file, $user)
    {
        $saveJson = json_encode($user);
        $result = file_put_contents($file, $saveJson);
        return $result;
    }

    function delete($file)
    {
        unlink($file);
        
        
    }
}
