<?php

namespace backend\controllers;

use Yii;
use common\models\Abc;
use backend\models\AbcSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AbcController implements the CRUD actions for Abc model.
 */
class AbcController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Abc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AbcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Coffee models.
     * @return mixed
     */
    public function actionRoot()
    {
        $models = Abc::find()
            ->andWhere(['parentid' => 0])
            ->orderBy(['title' => SORT_ASC])
            ->all();

        return $this->render('root', [
            'models' => $models,
        ]);
    }

    /**
     * Displays a single Abc model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Abc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate(string $parent=null)
    {
        $model = new Abc();

        $model->parentid = $parent;

        if ($model->load(Yii::$app->request->post())) {

            $model->img = UploadedFile::getInstance($model, 'img');

            if ($model->save()) {

                Yii::$app->session->addFlash('success', 'Успешно добавлено.');

                return $this->redirect(['update', 'id' => ($model->parentid ? $model->parentid : $model->id)]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Abc model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->img = UploadedFile::getInstance($model, 'img');

            if ($model->save()) {

                Yii::$app->session->addFlash('success', 'Успешно сохранено.');

                return $this->redirect(['update', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Abc model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $parenId = $model->parentid;

        $model->delete();

        return $parenId ? $this->redirect(['update', 'id' => $parenId]) : $this->redirect(['root']);
    }

    /**
     * Finds the Abc model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Abc the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Abc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
