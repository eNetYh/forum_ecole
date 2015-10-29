<a href="<?php echo WEBROOT.'home/consultpage'; ?>" class="btn btn-default"><i class="fa fa-long-arrow-left"></i> Revenir aux articles</a>
<br><br>
<div class="panel panel-info">
  <div class="panel-body">
    <div style="float: left; padding: 12px;margin-right : 30px;">
        <img src="<?php echo WEBROOT.'views/lib/img/articles/article-'.$article->getIdA().'.'.$article->getExtensionImage(); ?>" width="200" />
    </div>
      <h2><?php echo $article->getTitre(); ?></h2>
      <?php echo $article->getTexte(); ?>
  </div>
</div>
