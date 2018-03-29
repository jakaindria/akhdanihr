<?php
    
    use yii\grid\GridView;
    use yii\helpers\Html;
    
    /**
     * @var yii\web\View                                 $this
     * @var app\modules\org\models\search\PengurusSearch $searchModel
     * @var yii\data\ActiveDataProvider                  $dataProvider
     */
?>
<div class="pengurus-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'List {data}', [
                    'data' => \Yii::t('org_pengurus', 'Pengurus')
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
                                              'noktp:text',
                                              'alamat:text',
                                              'jabatan:text',
                                              [
                                                  'class'         => \yii\grid\DataColumn::className(),
                                                  'attribute'     => 'tglmenjabatdari',
                                                  'format'        => ['date', 'php:d mm Y'],
                                                  'filter'        => \kartik\date\DatePicker::widget([
                                                                                                         'model'         => $searchModel,
                                                                                                         'attribute'     => 'tglmenjabatdari',
                                                                                                         'layout'        => '{input}{remove}',
                                                                                                         'pluginOptions' => [
                                                                                                             'autoClose'      => TRUE,
                                                                                                             'format'         => 'yyyy-mm-dd',
                                                                                                             'todayHighlight' => TRUE
                                                                                                         ]
                                                                                                     ]),
                                                  'headerOptions' => [
                                                      'width' => '200px'
                                                  ]
                                              ],
                                              [
                                                  'class'         => \yii\grid\DataColumn::className(),
                                                  'attribute'     => 'tglmenjabatsampai',
                                                  'format'        => ['date', 'php:d mm Y'],
                                                  'filter'        => \kartik\date\DatePicker::widget([
                                                                                                         'model'         => $searchModel,
                                                                                                         'attribute'     => 'tglmenjabatsampai',
                                                                                                         'layout'        => '{input}{remove}',
                                                                                                         'pluginOptions' => [
                                                                                                             'autoClose'      => TRUE,
                                                                                                             'format'         => 'yyyy-mm-dd',
                                                                                                             'todayHighlight' => TRUE
                                                                                                         ]
                                                                                                     ]),
                                                  'headerOptions' => [
                                                      'width' => '200px'
                                                  ]
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
                                                                  'confirm' => \Yii::t('akhdanihr', 'Anda yakin akan menghapus') . ' ' . \Yii::t('org_pengurus', 'Pengurus') . ' ' . $model->nama . '?',
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
