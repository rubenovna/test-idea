<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 22.07.19
 * Time: 20:37
 */
namespace app\models;
use yii\base\Model;
use app\models\generated\Send;
use yii\web\UploadedFile;
class SendForm extends Model
{
    public $file;
    public $name;
    public $sumBYN;
     public $sumUSD;


    public function attributeLabels()// спомощью этого метода меняем наименованией полей используем место labels в forme
    {
        return [
            'name'=>'Ваше имя',
            'sumBYN'=>'Сумма',
        ];
    }
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg'],
            [['name', 'sumBYN'], 'required'],
            [['name', 'sumBYN', 'sumUSD' ], 'trim'],
        ];
    }
}