<?php $estilo_modulos = get_estilo_modulos(); ?> 
<?php $estilo_geral = get_estilo_geral();  ?>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=<?= $estilo_geral->fonte_letra ?>">
<?php
if ($estilo_geral->tipo_titulo == '0') {
  $class_br = "display:block";
  $class_titulo = "align='left'";
  $class_hr = "display:inline-block";
} else if ($estilo_geral->tipo_titulo == '1') {
  $class_br = "display:none";
  $class_titulo = "align='center'";
  $class_hr = "";
} else if ($estilo_geral->tipo_titulo == '2') {
  $class_br = "display:block";
  $class_titulo = "align='right'";
  $class_hr = "display:inline-block";
}
?>
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-lg-12">
      <div class="" <?= $class_titulo ?>>
        <?php
        if ($estilo_geral->tipo_barra == '0') {
          $style_barra = "display:none !important";
        } else {
          $style_barra = "border-top: 1px solid #" . $estilo_geral->estilo_barra;
        }
        ?>
        <hr class="hrExibicao" style="<?= $style_barra ?>;<?= $class_hr ?>">
        <h2 style="text-transform:uppercase;font-weight: 700;color: #<?= $estilo_modulos->cor_titulo_informativos ?>;font-family: <?= $estilo_geral->fonte_letra ?>;vertical-align: middle;margin-top: 1px;margin-bottom: 1px">NOSSAS CAMPANHAS</h2>
        <hr class="hrExibicao" style="<?= $style_barra ?>;<?= $class_hr ?>">
      </div>
    </div> 
  </div>
</div>
<div class="container">
  <div class="row my-4">
    <div class="col-lg-12 col-md-12 col-12" align="center">
      <div class="col-lg-7 col-md-7 col-12" style="padding: 0">
        <table class="table table-dark table-striped table-bordered">
          <thead>
            <tr>
              <th>Campanha</th>
              <th>Válido</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $newsDestaque = ExibicaoNewsSite();
            foreach ($newsDestaque as $news) {
              ?>
              <tr>
                <?php if ($news->NewsHTML == 1) { ?>
                  <td><a style="color: #fff;" target="_blank" href="https://homolog.taurusmulticanal.com.br/Dashboardv2/news_view_mkt.php?id=<?= $news->Token ?>"><?= utf8_encode($news->Nome) ?></a></td>
                <?php  } else { ?>
                  <td><a style="color: #fff;" target="_blank" href="https://homolog.taurusmulticanal.com.br/Dashboardv2/news-envio.php?id=<?= $news->Token ?>"><?= utf8_encode($news->Nome) ?></a></td>
                <?php  } ?>
                <td><?= date("d/m/Y", strtotime($news->Validade)) ?></td>
              </tr>
            <?php  } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div> 
</div> 