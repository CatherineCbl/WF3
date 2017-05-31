<!DOCTYPE html>
<?php
require "gestion_posts.php";
$mydb = new Post("localhost", "root", "", "projetapp");
$post = new Post("localhost", "root", "", "projetapp", 1);
 ?>
 <html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
	<body>
        <?php
             if (!empty($_POST)) {
                 if (empty($_POST["title"]))
                     echo "Titre vide";
                 elseif (empty($_POST["picture"]))
                     echo "Image vide";
                 elseif (empty($_POST["description"]))
                     echo "Description vide";
                 else {
                     $mydb->create($_POST, "posts");
                     echo '<ul class="list-group">
                     <li class="list-group-item list-group-item-success">Votre post a été ajouté</li>
                 </ul>';

                 }
             }
         ?>
        <main>
    		<form class="form-horizontal" method="POST">
    			<fieldset>
    				<!-- Form Name -->
    				<legend>
    					Ajouter Post
    				</legend>
    				<!-- Textarea -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="title">Titre</label>
    					<div class="col-md-4">
    						<textarea class="form-control" id="title" name="title">Votre titre</textarea>
    					</div>
    				</div>
    				<!-- Text input-->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="picture">Image</label>
    					<div class="col-md-4">
    						<input id="picture" name="picture" type="text" placeholder="URL de votre image" class="form-control input-md" required="">
    					</div>
    				</div>
    				<!-- Textarea -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="description">Description</label>
    					<div class="col-md-4">
    						<textarea class="form-control" id="description" name="description">default text</textarea>
    					</div>
    				</div>
    				<!-- Select Basic -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="category_id">Catégorie</label>
    					<div class="col-md-4">
    						<select id="category_id" name="category_id" class="form-control">
                                <?php
                                    $category = $mydb->read(array("id", "name"), "category", array("1"=>"1"));
                                    foreach($category as $key => $valeur)
                                        echo '<option value="'.$valeur["id"].'">'.$valeur["name"].'</option>';
                                 ?>
    						</select>
    					</div>
    				</div>
    				<!-- Button -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for=""></label>
    					<div class="col-md-4">
    						<button id="" name="" class="btn btn-primary" type="submit">Envoyer</button>
    					</div>
    				</div>
    			</fieldset>
    		</form>
    		<form class="form-horizontal" method="POST">
    			<fieldset>
    				<!-- Form Name -->
    				<legend>
    					Modifier Post
    				</legend>
    				<!-- Textarea -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="title">Titre</label>
    					<div class="col-md-4">
    						<textarea class="form-control" id="title" name="title"><?= $post->title ?></textarea>
    					</div>
    				</div>
    				<!-- Text input-->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="picture">Image</label>
    					<div class="col-md-4">
    						<input id="picture" name="picture" type="text" placeholder="URL de votre image" class="form-control input-md" required="">
    					</div>
    				</div>
    				<!-- Textarea -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="description">Description</label>
    					<div class="col-md-4">
    						<textarea class="form-control" id="description" name="description">default text</textarea>
    					</div>
    				</div>
    				<!-- Select Basic -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for="category_id">Catégorie</label>
    					<div class="col-md-4">
    						<select id="category_id" name="category_id" class="form-control">
                                <?php
                                    $category = $mydb->read(array("id", "name"), "category", array("1"=>"1"));
                                    foreach($category as $key => $valeur)
                                        echo '<option value="'.$valeur["id"].'">'.$valeur["name"].'</option>';
                                 ?>
    						</select>
    					</div>
    				</div>
    				<!-- Button -->
    				<div class="form-group">
    					<label class="col-md-4 control-label" for=""></label>
    					<div class="col-md-4">
    						<button id="" name="" class="btn btn-primary" type="submit">Envoyer</button>
    					</div>
    				</div>
    			</fieldset>
    		</form>
        </main>
	</body>
</html>
