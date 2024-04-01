<?php
declare(strict_types=1);

namespace app\Application\Service;

class CreateUser
{
    /**
     * @return void
     */
    public function create() {
        $userFile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($userFile, $txt);
        $txt = "Jane Doe\n";
        fwrite($userFile, $txt);
        fclose($userFile);
    }

    /**
     * @return int
     */
    public function countUsers() : int {
        $directory = getcwd()."/../../../users";
        $fileCount = 0;
        $files2 = glob( $directory ."*" );

        if($files2) {
            $fileCount = count($files2);
        }
        return $fileCount;
    }
}