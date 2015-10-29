<div class="row">

	<!-- Menu -->
	<div class="col-xs-3">
		<ul class="nav nav-pills nav-stacked">
		  <li role="presentation" id="menu-general" class="active"><a href="#"  onclick="switchMenu('general');" >Général</a></li>
		  <li role="presentation" id="menu-users" ><a href="#" onclick="switchMenu('users');" >Utilisateurs et Groupes</a></li>
		  <li role="presentation" id="menu-advanced" ><a href="#" onclick="switchMenu('advanced');" >Paramétrage avancé</a></li>
		</ul>

	</div>
	<!-- End Menu -->


	<!-- Panels -->
	<div class="col-xs-9">







		<!-- Menu General --> 
		<div id="panel-general">
			<h1>Général</h1>
		</div>
		<!-- End Menu General -->







		<!-- Menu Users -->
		<div id="panel-users" hidden>
			<h1>Utilisateurs et Groupes</h1>
			
			<!-- Menus groupes and users -->	
			<div class="row">
				<div class="btn-group" role="group" aria-label="...">
				  <div class="btn-group" role="group">
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				      <span class=" glyphicon glyphicon-user"></span> Utilisateurs
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu" role="menu">
				      <li><a href="#" onclick="switchUsageGroup('add-user');"><span class="glyphicon glyphicon-plus"></span> Ajout</a></li>
				      <li><a href="#" onclick="switchUsageGroup('update-user');"><span class="glyphicon glyphicon-edit"></span> Modification</a></li>
				    </ul>
				  </div>

				  <div class="btn-group" role="group">
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				      <span class=" glyphicon glyphicon-globe"></span> Groupes
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu" role="menu">
				      <li><a href="#" id="btn-add-group" onclick="switchUsageGroup('add-group');"><span class=" glyphicon glyphicon-plus"></span> Ajout</a></li>
				      <li><a href="#" id="btn-update-group" onclick="switchUsageGroup('update-group');"><span class="glyphicon glyphicon-edit"></span> Consulter / Modifier</a></li>
				    </ul>
				  </div>
				</div>
			</div>
			<!-- End Menu groupes and users-->


			<!-- Ajout Groupe -->
			<div class="row" id="panel-add-group" hidden>
				<br>
				<h4>Ajout d'un Groupe</h4>
				<form class="form-group" id="form-add-group" method="post">
					<input type="text" id="name-group" class="form-control" placeholder="Nom du Groupe"/><br>
 				
 				<label>Permissions</label><br>
 				<?php
 					foreach($access as $value)
 					{
 						$nameA = explode('_', $value['nomAccess']);
 						if($nameA[0] == 'R')
 						{
 							echo '<input type="checkbox" class="access-check" value="'.$value['codeAccess'].'"> '.' Lire '.$nameA[1].'<br><br>';
 						}
 						else if($nameA[0] == 'W')
 						{
 							echo '<input type="checkbox" class="access-check" value="'.$value['codeAccess'].'"> '.' Ecrire '.$nameA[1].'<br><br>';
 						}
 					}
 				?>
 				<button class="btn btn-primary" type="submit">
 					<span class=" glyphicon glyphicon-floppy-disk"></span> 
 					Enregistrer
 				</button>
 				</form>
			</div>
			<!-- End Ajout Groupe -->



			<!-- Modification / Consultation Groupe-->
			<div class="row" id="panel-update-group" hidden>
				<br>
				<h4>Vue des Groupes</h4>
				<div class="col-xs-5">
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nom</th>
							<th>+</th>
						</tr>
					</thead>
					<tbody>
					<?php
	 					foreach($groupes as $value)
	 					{
	 						echo '<tr>';
	 						echo '<td>'.$value['numGroupe'].'</td><td>'.$value['nomGroupe'].'</td><td><button onclick="getInfosGroupe('.$value['numGroupe'].','.$nbRights.')" ><span class="glyphicon glyphicon-pencil"></span></button></td>';
	 						echo '</tr>';
	 					}
	 				?>
	 				<tbody>
	 				</table>
 				</div>
 				<div class="col-xs-7" id="details-groupe" hidden>
 					<h4>Nom du Groupe</h4>
 					<input type="text" class="form-control" id="groupName"/><br>
 					<?php
 					$i = 1;
 					foreach($access as $value)
 					{
 						$nameA = explode('_', $value['nomAccess']);
 						if($nameA[0] == 'R')
 						{
 							echo '<input type="checkbox" class="access-check" id="right-'.$i.'" value="'.$value['codeAccess'].'"> '.' Lire '.$nameA[1].'<br><br>';
 						}
 						else if($nameA[0] == 'W')
 						{
 							echo '<input type="checkbox" class="access-check" id="right-'.$i.'" value="'.$value['codeAccess'].'"> '.' Ecrire '.$nameA[1].'<br><br>';
 						}
 						$i++;
 					}
 					?>
 					<button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Modifier</button><br><br>
 				</div>
			</div>
			<!-- End Modif Groupes-->

			
			<!-- Ajout User -->
			<div class="row" id="panel-add-user" hidden>
				<br>
				<h4>Ajout d'un Utilisateur</h4>
				<form class="form-group" id="form-add-user" method="post">
					<input type="text" id="login-user" class="form-control" placeholder="Login Utilisateur"/><br>
 					<input type="text" id="login-user" class="form-control" placeholder="Mot de passe Utilisateur"/><br>
 					
 					<label>Groupe :</label>
					<select class="form-control">
						<?php
							foreach($groupes as $value)
							{
								echo '<option value="'.$value['numGroupe'].'">'.$value['nomGroupe'].'</option>';
							}
						?>
					</select>
					<br>

 				<button class="btn btn-primary" type="submit">
 					<span class=" glyphicon glyphicon-floppy-disk"></span> 
 					Enregistrer
 				</button>
 				</form>
			</div>
			<!-- End Ajout User -->



			<!-- Modification / Consultation Users -->
			<div class="row" id="panel-update-user" hidden>
				<br>
				<h4>Vue des Utilisateurs</h4>
				<div class="col-xs-5">
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>Login</th>
							<th>Groupe</th>
							<th>+</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($users as $value)
							{
								echo '<tr>';
								echo '<td>'.$value['login'].'</td><td>'.$value['nomG'].'</td><td><button><span class="glyphicon glyphicon-pencil"></span></button></td>';
								echo '</tr>';
							}
						?>
	 				<tbody>
	 				</table>
 				</div>
 				<div class="col-xs-7">
 					
 				</div>
			</div>
			<!-- End Modif Users-->


		   		
		   
		</div>
		<!-- End Menu Users -->







		<!-- Menu parametres avanced -->
		<div id="panel-advanced" hidden>
			<h1>Paramètres avancés</h1>
		</div>
		<!-- End Menu parametres avanced -->



	</div>
	<!-- End Panels -->
</div>



<!-- Système de navigation Principal -->
<script>
	function switchMenu(name)
	{
		hidePanels();
		$("#panel-" + name).fadeIn();
		$("#menu-" + name).addClass("active")
	}
	function hidePanels()
	{
		$("#panel-general").hide();
		$("#menu-general").removeClass("active");
		$("#panel-users").hide();
		$("#menu-users").removeClass("active");
		$("#panel-advanced").hide();
		$("#menu-advanced").removeClass("active");		
	}
</script>
<!-- End Système de navigation Principal -->


<!-- Système de navigation Users and groupes -->
<script>
	function switchUsageGroup(name)
	{
		hidePanelsGroupes();
		$("#panel-"+name).fadeIn();

	}
	function hidePanelsGroupes()
	{
		$("#panel-add-group").hide();
		$("#panel-update-group").hide();
		$("#panel-add-user").hide();
		$("#panel-update-user").hide();
	}

	function getInfosGroupe(numG,nbRights)
	{
		$.post('getInfosGroupe',{id: numG},function(data)
		{
			$('#details-groupe').hide().fadeIn();
			var datas = JSON.parse(data);
			$('#groupName').val(datas[0].nomGroupe);
			var accessInt = datas[0].acces;
			var accessList = accessInt.split("");
			var y = 1;
			while(y < nbRights)
			{
				$('#right-'+y).prop('checked', false);
				y++;
			}

			y = 1;
			
			for(i=accessList.length-1; i>=1 ; i-- )
			{
				if( accessList[i] == 1)
				{
					$('#right-'+y).prop('checked', true);
				}
				y++;
			}
			return false;
		});
	}

</script>
<!-- End Système de navigation Users and groupes -->



