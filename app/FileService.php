<?php

declare(strict_types=1);

class fileServices
{




    /**
     * get content of all files in this diractory
     *
     * @param string $pathDiractory
     * @return array files content
     */
    public function getContent(string $pathDiractory): array
    {
        return $this->read($this->get($pathDiractory));
    }



    /**
     * get all files from path directory
     *
     * @param string $pathDiractory
     * @param bool $includePath true to include the full path file | false other wise 
     * @return array files name, true with full path | false otherwise
     */
    public function get(string $pathDiractory, bool $includePath = true): array
    {

        $files = [];
        foreach (scandir($pathDiractory) as $file) {
            if (is_dir($pathDiractory . $file)) {
                continue;
            }
            $files[] = ($includePath) ? $pathDiractory . $file :  $file;
        }

        return $files;
    }



    /**
     * read files line by line 
     *
     * @param array $files
     * @return array array of content file
     */
    public function read(array $files): array
    {

        $Totalines = [];
        foreach ($files as $file) {
            $lines = file($file);
            unset($lines[0]);
            $Totalines = array_merge($lines, $Totalines);
        }
        return $Totalines;
    }
}
