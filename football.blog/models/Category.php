<?php

namespace app\models;
 
use Yii;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['image_web_filename','image_src_filename'], 'string'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg'],
            [['image'], 'file', 'maxSize'=>'4550000'],
         ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'name' => 'Наименование',
            'description' => 'Описание',
             'image' => 'Картинка',
       ];
    }
   public function categories()
   {
          $query = Category::find();
          $categor = $query->orderBy('name');

        return $this->render('index', [
            'names' => $categor
        ]);

   }
}
