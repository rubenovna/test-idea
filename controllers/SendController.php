<?php
/**
 * Created by PhpStorm.
 * User: lilia
 * Date: 1/10/20
 * Time: 12:48 PM
 */

namespace app\controllers;

use app\models\generated\Send;
use app\models\SendForm;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use PHPMailer;


class SendController extends Controller
{

    public function actionIndex()
    {

        $data = 'http://www.nbrb.by/api/exrates/rates?periodicity=0';

        $json = file_get_contents($data);

        $courses = json_decode($json, true);
        foreach ($courses as $key => $value) {


            if ($value['Cur_Abbreviation'] === 'USD') {
                $USD = $value['Cur_OfficialRate'];
            }


        }


        $model = new SendForm();
        if (\Yii::$app->request->isAjax) {
            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           // return 'Запрос принят!';

        } else {
            echo "Ошибка в ajax запросе";
        }
            if ($model->load(\Yii::$app->request->post())) {


                $model->file = UploadedFile::getInstance($model, 'file');


                if ($model->file && $model->validate()) {
                    $send = new Send();
                    $send->name = $model->name;
                    $send->sumBYN = $model->sumBYN;
                    $send->sumUSD = $model->sumBYN / $USD;
                    $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                    $path = ('uploads/' . $model->file);
                    $send->image = $path;


                    if ($send->save()) {
                        Yii::$app->mailer->compose()
                            ->setFrom(['lilia.abaghyan@gmail.com' => 'Администратор'])
                            ->setTo(['lilia.abaghyan@gmail.com' => 'Поступил новый заказ'])
                            ->setSubject('Новый заказ')
                            ->setTextBody('Имя клиента - ' . $send->name . ',  ' . ' Сумма(USD) - ' . $send->sumUSD . ' $')
                            ->attach($path)
                            ->send();

                    } else {
                        echo "Произошла ошибка при сохранении";

                    }


                } else {
                    echo "Произошла ошибка при валидации";
                }
            } else {
                echo "Произошла ошибка.";
            }
            return $this->render('index', compact('model'));

}



}

