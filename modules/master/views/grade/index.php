<?php
    
    use yii\grid\GridView;
    use yii\helpers\Html;
    
    /**
     * @var yii\web\View                                 $this
     * @var app\modules\master\models\search\GradeSearch $searchModel
     * @var yii\data\ActiveDataProvider                  $dataProvider
     */
?>

<div class="grade-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'List {data}', [
                    'data' => \Yii::t('master_grade', 'Grade')
                ]) ?>
            </h3>
        </div>
        <div class="title_right">
            <div class="col-xs-12 text-right">
                <?= Html::a('<i class="fa fa-plus"></i> ' . \Yii::t('akhdanihr', 'Tambah'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 0']) ?>
            </div>
        </div>
    </div>

    <div class="x_panel">
        <div class="x_content">
            <?php try {
                echo GridView::widget([
                                          'dataProvider' => $dataProvider,
                                          'filterModel'  => $searchModel,
                                          'emptyText'    => Yii::t('akhdanihr', 'Data dengan kriteria yang anda cari tidak ditemukan!'),
                                          'layout'       => "{items}\n{summary}\n{pager}",
                                          'columns'      => [
                                              [
                                                  'class'         => \yii\grid\SerialColumn::className(),
                                                  'headerOptions' => [
                                                      'width' => '80px'
                                                  ]
                                              ],
                        
                                              'nama:text',
                                              [
                                                  'class'          => \yii\grid\DataColumn::className(),
                                                  'attribute'      => 'ratesalary',
                                                  'format'         => 'text',
                                                  'contentOptions' => [
                                                      'class' => 'text-right'
                                                  ],
                                                  'value'          => function ($model, $key, $index, $column) {
                                                      return \Yii::$app->formatter->asCurrency($model->ratesalary, 'IDR');
                                                  }
                                              ],
                                              [
                                                  'class'          => \yii\grid\DataColumn::className(),
                                                  'attribute'      => 'spjharian',
                                                  'format'         => 'text',
                                                  'contentOptions' => [
                                                      'class' => 'text-right'
                                                  ],
                                                  'value'          => function ($model, $key, $index, $column) {
                                                      return \Yii::$app->formatter->asCurrency($model->spjharian, 'IDR');
                                                  }
                                              ],
                                              [
                                                  'class'          => \yii\grid\DataColumn::className(),
                                                  'attribute'      => 'plafonpinjaman',
                                                  'format'         => 'text',
                                                  'contentOptions' => [
                                                      'class' => 'text-right'
                                                  ],
                                                  'value'          => function ($model, $key, $index, $column) {
                                                      return \Yii::$app->formatter->asCurrency($model->plafonpinjaman, 'IDR');
                                                  }
                                              ],
                                              [
                                                  'class'          => \yii\grid\DataColumn::className(),
                                                  'attribute'      => 'isactive',
                                                  'format'         => 'html',
                                                  'filter'         => [
                                                      '0' => \Yii::t("akhdanihr", 'Tidak'),
                                                      '1' => \Yii::t("akhdanihr", 'Ya')
                                                  ],
                                                  'headerOptions'  => [
                                                      'width' => '60px',
                                                      'class' => 'text-center'
                                                  ],
                                                  'contentOptions' => [
                                                      'class' => 'text-center'
                                                  ],
                                                  'value'          => function ($model, $key, $index, $column) {
                                                      $value = $model->isactive ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-times text-danger'></i>";
                                
                                                      return $value;
                                                  }
                                              ],
                        
                                              [
                                                  'class'          => \yii\grid\ActionColumn::className(),
                                                  'header'         => \Yii::t("akhdanihr", 'Aksi'),
                                                  'headerOptions'  => [
                                                      'width' => '150px'
                                                  ],
                                                  'contentOptions' => [
                                                      'class' => 'text-center'
                                                  ],
                                                  'buttons'        => [
                                                      'view'   => function ($url, $model, $key) {
                                                          return Html::a("<i class='fa fa-eye'></i>", $url, [
                                                              'class' => 'btn btn-sm btn-info text-center',
                                                              'style' => 'margin-bottom: 0',
                                                              'title' => \Yii::t("akhdanihr", 'Detail')
                                                          ]);
                                                      },
                                                      'update' => function ($url, $model, $key) {
                                                          return Html::a("<i class='fa fa-edit'></i>", $url, [
                                                              'class' => 'btn btn-sm btn-warning text-center',
                                                              'style' => 'margin-bottom: 0',
                                                              'title' => \Yii::t("akhdanihr", 'Edit')
                                                          ]);
                                                      },
                                                      'delete' => function ($url, $model, $key) {
                                                          return Html::a("<i class='fa fa-trash'></i>", $url, [
                                                              'class' => 'btn btn-sm btn-danger text-center',
                                                              'style' => 'margin-bottom: 0; margin-right: 0',
                                                              'data'  => [
                                                                  'confirm' => \Yii::t('akhdanihr', 'Anda yakin akan menghapus') . ' ' . \Yii::t('master_grade', 'Grade') . ' ' . $model->nama . '?',
                                                                  'method'  => 'DELETE'
                                                              ],
                                                              'title' => \Yii::t("akhdanihr", 'Hapus')
                                                          ]);
                                                      }
                                                  ]
                                              ]
                                          ],
                                      ]);
            } catch (Exception $e) {
                Yii::error($e->getMessage());
            } ?>
        </div>
    </div>
</div>