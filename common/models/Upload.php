<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "upload".
 *
 * @property integer $id
 * @property string $image
 * @property string $file
 * @property integer $created_at
 * @property integer $updated_at
 */
class Upload extends \common\models\CustomActiveRecord
{
    /**
     * 不存在imageHidden ，fileHidden属性
     * 添加这两个属性是为了解决上传插件无法插入value到执行input下，所以想到此方法解决问题.
     * 所有涉及到这两个属性的地方，都需要做出调整.
     */
    var $imageHidden;
    var $fileHidden;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageHidden','fileHidden'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['image', 'file'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => '图片',
            'file' => '文件',
            'imageHidden' => '图片',
            'fileHidden' => '文件',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
