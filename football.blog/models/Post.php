<?php
 
namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $category_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category_id', 'status'], 'required'],
            [['content','image_web_filename','image_src_filename','tags'], 'string'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'550000'],
            [['title'], 'string', 'max' => 255],
        ];
    }
public function behaviors()
{
    return [
        TimestampBehavior::className(),
    ];
}

public function getCategory()
{
   return $this->hasOne(Category::className(), ['id' => 'category_id']);
}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'title' => 'Заглавие',
            'content' => 'Содержание',
            'category_id' => 'Код категории',
            'status' => 'Статус',
            'image' => 'Картинка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'tags' => 'Тэги',
        ];
    }
}
