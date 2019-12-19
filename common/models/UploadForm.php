<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $CaminhoPasta;

    public function rules()
    {
        return [
            [['imageFile'], 'imageFile', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['CaminhoPasta'], 'CaminhoPasta', 'skipOnEmpty' => false, 'extensions' => 'mp3, wav'],
            //[['CaminhoPasta'], 'CaminhoPasta', 'maxFiles' => 10, 'extensions' => 'mp3, wav'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->CaminhoPasta as $file) {
                $file->saveAs('./../../backend/songs' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}