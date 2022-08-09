<?php

namespace frontend\modules\manager\controllers;

use common\models\GroupPerson;
use common\models\Groups;
use common\models\Person;
use common\models\Rtom;
use common\models\RtomManager;
use common\models\search\GroupSearch;
use common\models\search\PersonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for Groups model.
 */
class GroupController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Groups models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Groups model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $searchModel = new PersonSearch();
        $dataProvider = $searchModel->searchGroup($this->request->queryParams,$id);

        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewPerson($id)
    {
        return $this->render('person/view', [
            'model' => Person::findOne($id),
        ]);
    }

    public function actionGetuid($id){
        if($model = Person::findOne(['uid'=>$id])){
            return json_encode([
                'uid'=>$model->uid,
                'full_name'=>$model->full_name,
                'phone'=>$model->phone,
                'birthday'=>$model->birthday,
                'gender'=>$model->gender,
            ]);
        }else{
            return 0;
        }
    }


    public function actionCreatePerson($id)
    {
        $model = new Person();
        $group = new GroupPerson();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) and $group->load($this->request->post())) {
                $userid = \Yii::$app->user->identity->district_id;
                $model->rtom_id = Rtom::findOne(['district_id'=>$userid])->id;
                if($uid = Person::findOne(['uid'=>$model->uid])){

                    $group->group_id = $id;
                    $group->person_id = $uid->id;
                    $group->status_id = 1;
                    $group->save();
                    return $this->redirect(['/manager/group/view', 'id' => $id]);
                }elseif($model->save()){
                    $model->save(false);

                    $group->group_id = $id;
                    $group->person_id = $model->id;
                    $group->status_id = 1;
                    $group->save();
                    return $this->redirect(['/manager/group/view', 'id' => $id]);
                }

            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('person/create', [
            'model' => $model,
            'group'=>$group
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatePerson($id)
    {
        $model = Person::findOne($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('person/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     * delete-person
     */
    public function actionDeletePerson($id)
    {
        $gid = GroupPerson::findOne(['person_id'=>$id])->group_id;
        Person::findOne($id)->delete();

        return $this->redirect(['view','id'=>$gid]);
    }
    /**
     * Creates a new Groups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Groups();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $model->rtom_id = Rtom::findOne(['district_id'=>\Yii::$app->user->identity->district_id])->id;
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);

                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Groups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Groups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Groups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Groups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Groups::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
