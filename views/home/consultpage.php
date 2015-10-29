<table class="table table-stripped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Titre</th>
      <th>Details</th>
      <th>Supprimer</th>
    </tr>
  </thead>
  <tbody id="table-articles">
    <?php
    foreach ($articles as $article) {
      echo '<tr id="article-nb-'.$article->getIdA().'">';
      echo '<td>'.$article->getIdA().'</td>';
      echo '<td>'.$article->getTitre().'</td>';
      echo '<td><a class="btn btn-success" href="'.WEBROOT.'index.php?p=home/detailsarticle&idA='.$article->getIdA().'"><i class="fa fa-search-plus"></i></a></td>';
      echo '<td><button class="btn btn-danger" onclick="delArticle('.$article->getIdA().')" ><i class="fa fa-times"></i></button></td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="confirm-del" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <center><h4 class="modal-title">Voulez-vous supprimer l'article numéro <span id="num-article"></span> ?</h4></center>
      </div>
      <div class="modal-body">
        <center>
          <button type="button" class="btn btn-danger" id="btn-del" data-dismiss="modal">Oui</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
        </center>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function delArticle(idA){
    $("#num-article").text(idA);
    $('#confirm-del').modal('show');
  }
  $("#btn-del").click(function() {
      var idA = $("#num-article").text();
      $.post('deleteArticle',{idA: idA});
      $('#article-nb-'+idA).fadeOut();
  });
</script>
