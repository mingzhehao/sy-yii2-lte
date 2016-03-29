<?php
namespace common\modules\user\models;


/**
 * UploadForm is the model behind the upload form.
 */

/** 
 * modify yun.song1989@gmail.com   2015-01-15
 * 调整支持默认生成三种图像，small，middle，big 可设定值
 */

class CropAvatar {
    private $src;
    private $data;
    private $file;
    private $dst;
    private $type;
    private $extension;
    private $smallWidth  = '48';
    private $smallHeight = '48';
    private $middleWidth = '120';
    private $middleHeight= '120';
    private $bigWidth    = '200';
    private $bigHeight   = '200';
    private $srcDir = 'images/cropper';//上传的原图
    private $dstDir = 'images/avatar';//修改后的目标图
    private $msg;

    function __construct($src, $data, $file) {
        $this -> setSrc($src);
        $this -> setData($data);
        $this -> setFile($file);
        $this -> crop($this -> src, $this -> dst, $this -> data);
    }

    private function setSrc($src) {
        if (!empty($src)) {
            $type = exif_imagetype($src);

            if ($type) {
                $this -> src = $src;
                $this -> type = $type;
                $this -> extension = image_type_to_extension($type);
                $this -> setDst();
            }
        }
    }

    private function setData($data) {
        if (!empty($data)) {
            $this -> data = json_decode(stripslashes($data));
        }
    }

    private function setFile($file) {
        $errorCode = $file['error'];

        if ($errorCode === UPLOAD_ERR_OK) {
            $type = exif_imagetype($file['tmp_name']);

            if ($type) {
                $dir = $this -> srcDir;

                if (!file_exists($dir)) {
                    mkdir($dir, 0777);
                }

                $extension = image_type_to_extension($type);
                $src = $dir . '/' . date('YmdHis') . $extension;

                if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG) {

                    if (file_exists($src)) {
                        unlink($src);
                    }

                    $result = move_uploaded_file($file['tmp_name'], $src);

                    if ($result) {
                        $this -> src = $src;
                        $this -> type = $type;
                        $this -> extension = $extension;
                        $this -> setDst();
                    } else {
                         $this -> msg = 'Failed to save file';
                    }
                } else {
                    $this -> msg = 'Please upload image with the following types: JPG, PNG, GIF';
                }
            } else {
                $this -> msg = 'Please upload image file';
            }
        } else {
            $this -> msg = $this -> codeToMessage($errorCode);
        }
    }

    private function setDst() {
        $dir = $this -> dstDir;

        if (!file_exists($dir)) {
            mkdir($dir, 0777);
        }

        $this -> dst = $dir . '/' . date('YmdHis') . $this -> extension;
    }

    private function crop($src, $dst, $data) {
        if (!empty($src) && !empty($dst) && !empty($data)) {
            switch ($this -> type) {
                case IMAGETYPE_GIF:
                    $src_img = imagecreatefromgif($src);
                    break;

                case IMAGETYPE_JPEG:
                    $src_img = imagecreatefromjpeg($src);
                    break;

                case IMAGETYPE_PNG:
                    $src_img = imagecreatefrompng($src);
                    break;
            }

            if (!$src_img) {
                $this -> msg = "Failed to read the image file";
                return;
            }
            $dst = explode('.',$dst);
            $this->createImages($src_img,$dst['0'].'_small.'.$dst['1'],$data,$this->smallWidth,$this->smallHeight);/*第一张小图生成*/
            $this->createImages($src_img,$dst['0'].'_middle.'.$dst['1'],$data,$this->middleWidth,$this->middleHeight);/*第二张小图生成*/
            $this->createImages($src_img,$dst['0'].'_big.'.$dst['1'],$data,$this->bigWidth,$this->bigHeight);/*第三张小图生成*/
            imagedestroy($src_img);
        }
    }

    private function createImages($src_img,$dst,$data,$width,$height)
    {
        $dst_img = imagecreatetruecolor($width,$height);
        $result = imagecopyresampled($dst_img, $src_img, 0, 0, $data -> x, $data -> y, $width,$height, $data -> width, $data -> height);

        if ($result) {
            switch ($this -> type) {
                case IMAGETYPE_GIF:
                    $result = imagegif($dst_img, $dst);
                    break;

                case IMAGETYPE_JPEG:
                    $result = imagejpeg($dst_img, $dst);
                    break;

                case IMAGETYPE_PNG:
                    $result = imagepng($dst_img, $dst);
                    break;
            }

            if (!$result) {
                $this -> msg = "Failed to save the cropped image file";
            }
        } else {
            $this -> msg = "Failed to crop the image file";
        }
        imagedestroy($dst_img);
    }


    private function codeToMessage($code) {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;

            case UPLOAD_ERR_FORM_SIZE:
                $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                break;

            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded';
                break;

            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded';
                break;

            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder';
                break;

            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk';
                break;

            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension';
                break;

            default:
                $message = 'Unknown upload error';
        }

        return $message;
    }

    public function getResult() {
        return !empty($this -> data) ? $this -> dst : $this -> src;
    }

    public function getMsg() {
        return $this -> msg;
    }
}
