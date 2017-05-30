<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title></title>
      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
       <?php
            if (!empty($_POST)) {
                if (empty($_POST["name"]))
                    echo "Nom vide";
                elseif (empty($_POST["slug"]))
                    echo "Slug vide";
                elseif (empty($_POST["image"]))
                    echo "Image vide";
                else {
                    require "crud.php";
                    $mydb = new Crud("localhost", "root", "", "projetapp");
                    $mydb->create($_POST, "category");
                    echo '<ul class="list-group">
                    <li class="list-group-item list-group-item-success">Votre catégorie a été ajoutée</li>
                </ul>';

                }
            }
        ?>
      <form class="form-horizontal" method="POST">
         <fieldset>
            <!-- Form Name -->
            <legend>Form Name</legend>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label" for="name">Nom</label>
               <div class="col-md-4">
                  <input id="name" name="name" type="text" placeholder="Nom" class="form-control input-md" required="">
               </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label" for="slug">Slug</label>
               <div class="col-md-4">
                  <input id="slug" name="slug" type="text" placeholder="Slug" class="form-control input-md" required="">
               </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
               <label class="col-md-4 control-label" for="image">Image</label>
               <div class="col-md-4">
                  <input id="image" name="image" type="text" placeholder="URL de votre image" class="form-control input-md" required="">
               </div>
            </div>
            <!-- Select Basic -->
            <div class="form-group">
               <label class="col-md-4 control-label" for="type">Type</label>
               <div class="col-md-4">
                  <select id="type" name="type" class="form-control">
                     <option value="category">Catégorie</option>
                     <option value="trend">Tendance</option>
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
   </body>
</html>
