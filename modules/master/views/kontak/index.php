<?php
    
    use app\modules\master\models\Kontak;
    use yii\grid\GridView;
    use yii\helpers\Html;
    
    /**
     * @var yii\web\View                                  $this
     * @var app\modules\master\models\search\KontakSearch $searchModel
     * @var yii\data\ActiveDataProvider                   $dataProvider
     * @var array                                         $jenis       Jenis kontak dari master referensi
     * @var array                                         $asal        Asal kontak dari master referensi
     * @var array                                         $klasifikasi Klasifikasi kontak dari master referensi
     */
    
    $jenis = Kontak::getJenisWithLabel();
    $asal = Kontak::getAsalWithLabel();
    $klasifikasi = Kontak::getKlasifikasiWithLabel();
?>
<div class="kontak-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= \Yii::t('akhdanihr', 'List {data}', [
                    'data' => \Yii::t('master_kontak', 'Kontak')
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
                                              'telepon:text',
                                              'email:text',
                                              [
                                                  'class'         => \yii\grid\DataColumn::className(),
                                                  'attribute'     => 'jenis',
                                                  'format'        => 'text',
                                                  'filter'        => $jenis,
                                                  'headerOptions' => [
                                                      'class' => 'text-center'
                                                  ],
                                                  'value'         => function ($model, $key, $index, $column) use ($jenis) {
                                                      return $jenis[$model->jenis];
                                                  }
                                              ],
                                              [
                                                  'class'         => \yii\grid\DataColumn::className(),
                                                  'attribute'     => 'asal',
                                                  'format'        => 'text',
                                                  'filter'        => $asal,
                                                  'headerOptions' => [
                                                      'class' => 'text-center'
                                                  ],
                                                  'value'         => function ($model, $key, $index, $column) use ($asal) {
                                                      return $asal[$model->asal];
                                                  }
                                              ],
                                              [
                                                  'class'         => \yii\grid\DataColumn::className(),
                                                  'attribute'     => 'klasifikasi',
                                                  'format'        => 'text',
                                                  'filter'        => $klasifikasi,
                                                  'headerOptions' => [
                                                      'class' => 'text-center'
                                                  ],
                                                  'value'         => function ($model, $key, $index, $column) use ($klasifikasi) {
                                                      return $klasifikasi;
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
                                                                  'confirm' => \Yii::t('akhdanihr', 'Anda yakin akan menghapus') . ' ' . \Yii::t('master_kontak', 'Kontak') . ' ' . $model->nama . '?',
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
