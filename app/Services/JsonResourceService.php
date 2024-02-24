<?php

namespace App\Services;

use Illuminate\Http\File;

class JsonResourceService
{
    public function getResources(string $filename)
    {
        $filePath = resource_path() . "/json/{$filename}.json";
        $json = (new File($filePath))->getContent();

        return json_validate($json) ? json_decode($json, true) : null;
    }
}
