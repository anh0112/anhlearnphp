<?php
class ImageUpload {
    private $targetDir;

    public function __construct($targetDir) {
        $this->targetDir = $targetDir;
    }


    public function checkFile($file) {
 
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedFormats)) {
            return "File not valid. Only image files are allowed to be uploaded (jpg, jpeg, png, gif).";
        }

        return ""; 
    }
}
?>