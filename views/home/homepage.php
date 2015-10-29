<style>
.btn-file {
   position: relative;
   overflow: hidden;
}
.btn-file input[type=file] {
   position: absolute;
   top: 0;
   right: 0;
   min-width: 100%;
   min-height: 100%;
   font-size: 100px;
   text-align: right;
   filter: alpha(opacity=0);
   opacity: 0;
   outline: none;
   background: white;
   cursor: inherit;
   display: block;
}
</style>

<form method="post" enctype="multipart/form-data" action="<?php echo WEBROOT.'home/homepage'; ?>">
    <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre"><br>
    <span class="btn btn-primary btn-file">
    Image <input type="file" name="img"> <span class="glyphicon glyphicon-folder-open"></span>
    </span>
    <br><br>
    <textarea name="texte" id="texte" rows="10" cols="80">
    </textarea><br>
    <button id="btn-add" class="btn btn-success">Publier</button>
    <script>
        CKEDITOR.replace( 'texte' );
    </script>
</form>
<!-- Modal -->
<div class="modal fade" id="text-success" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <h4 class="modal-title" id="myModalLabel">Votre Article à bien été enregistré <i class="fa fa-check"></i></h4>
        <br><button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
        </center>
      </div>
    </div>
  </div>
</div>
