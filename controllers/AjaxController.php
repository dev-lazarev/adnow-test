<?php
/**
 * Created by PhpStorm.
 * User: Lazarev Aleksey
 * Date: 24.08.16
 * Time: 9:17
 */


namespace app\controllers;

use app\models\Mosaic;
use Yii;
use yii\web\Controller;

class AjaxController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionGet()
    {

        header('Content-Type: application/json');
        $result = ['status' => 'false'];
        $id = Yii::$app->request->get('id', '');

        $mosaicModel = new Mosaic();
        $mosaic = $mosaicModel->getFromId(new \MongoDB\BSON\ObjectID($id));


        if (!empty($mosaic)) {
            $mosaic->_id = (string)$mosaic->_id;
            echo json_encode($mosaic);
        } else {
            echo json_encode($result);
        }
    }

    public function actionUpdate()
    {

        header('Content-Type: application/json');
        $result = ['status' => 'false'];
        $id = Yii::$app->request->post('id', '');
        $name = Yii::$app->request->post('name', '');
        $date = Yii::$app->request->post('date', '');
        $array = Yii::$app->request->post('array', []);

        $mosaicModel = new Mosaic();
        if(empty($id)){
            if(!empty($mosaicModel->getFromName($name))){
                $result['error'] = 'name already used';
            }else{
                $id = $mosaicModel->create(['name'=>$name, 'array'=>$array, 'date'=>$date]);
                $result['status'] = 'true';
                $result['message'] = 'create';
                $result['id'] = (string)$id;
            }
        }else{
            $mosaicModel->update(new \MongoDB\BSON\ObjectID($id), ['array'=>$array]);
            $result['status'] = 'true';
            $result['message'] = 'update';
        }


        echo json_encode($result);

    }

    public function actionDelete()
    {

        header('Content-Type: application/json');
        $result = ['status' => 'false'];
        $id = Yii::$app->request->post('id', '');

        $mosaicModel = new Mosaic();
        if(!empty($id)){
            $mosaicModel->remove(['_id'=>new \MongoDB\BSON\ObjectID($id)]);
            $result['status'] = 'true';
            $result['message'] = 'delete';
        }

        echo json_encode($result);
    }
}
