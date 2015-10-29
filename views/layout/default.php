<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion d'Articles</title>

        <!-- Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link href="<?php echo WEBROOT; ?>views/lib/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>


        <!-- Dashboard -->
        <link href="<?php echo WEBROOT.'views/lib/css/dashboard.css'; ?>" rel='stylesheet' />
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo WEBROOT; ?>views/lib/js/bootstrap.min.js"></script>
        <script src="<?php echo WEBROOT; ?>views/lib/js/scrollTo.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
                <!-- inclusion des librairies jQuery et jQuery UI (fichier principal et plugins) -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <!-- Full Calendar-->
        <link href="<?php echo WEBROOT.'views/lib/fc/fullcalendar.css'; ?>" rel='stylesheet' />
        <link href="<?php echo WEBROOT.'views/lib/fc/fullcalendar.print.css'; ?>" rel='stylesheet' media='print' />
        <script src="<?php echo WEBROOT.'views/lib/fc/moment.min.js'; ?>"></script>
        <script src="<?php echo WEBROOT.'views/lib/fc/fullcalendar.min.js'; ?>"></script>
        <script src="<?php echo WEBROOT.'views/lib/fc/lang-all.js'; ?>"></script>


    </head>

    <?php if(!empty($_SESSION['id'])){ ?>
      <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><i class="fa fa-pencil-square-o"></i> Gestion d'Articles</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo WEBROOT.'application/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="post" action="<?php echo WEBROOT.'home/consultpage'; ?>">
            <input type="text" name="rech" class="form-control" placeholder="Recherche..."> <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Rechercher</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <?php $params = explode('/',$_GET['p']); ?>
            <li <?php if($params[1] == 'homepage'){echo 'class="active"'; } ?> ><a href="<?php echo WEBROOT.'home/homepage'; ?>"><i class="fa fa-plus"></i> Ajouter un Article <span class="sr-only">(current)</span></a></li>
            <li <?php if($params[1] == 'consultpage'){echo 'class="active"'; } ?> ><a href="<?php echo WEBROOT.'home/consultpage'; ?>"><i class="fa fa-list-ul"></i> Consulter les Articles</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php }else{ ?>
        <body style="background-image: url(<?php echo WEBROOT.'views/lib/img/back.jpg'; ?>);">
        <?php } ?>
            <?php echo $content_for_layout; ?>
        </div>
      </div>
    </div>


    </body>
</html>
