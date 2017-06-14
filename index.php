<?php
require_once('php/municipios/modelo.php');
$provincia='';
$id='';
if(isset($_POST['provincias'])){
  $provincia=$_POST['provincias'];
  $id=$_POST['id'];

  $Municipios = new Municipios();
  $listado = $Municipios->lista($id);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Provincia</title>

    <!-- Bootstrap -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="style.css" >
  </head>
  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">Provincias</h3>
      </div>

      <div class="jumbotron">
        <h1>Provincias de España</h1>
        <p class="lead">Por favor escribé una provincia</p>
        <form method="post">
          <div class="input-group">
            <input type="text" class="form-control" id="provincias" name="provincias" placeholder="Buscar por..." value="<?php echo $provincia; ?>">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <span class="input-group-btn">
              <button class="btn btn-success" type="button">Buscar!</button>
            </span>
          </div><!-- /input-group -->
        </form>        
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <h2>Mapa</h2>
          <div id="map_wrapper">
              <div id="map_canvas" class="mapping"></div>
          </div>
        </div>
      </div>
<br>
<br>
<br>
    </div> <!-- /container -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript">
      var markers = <?php echo json_encode($listado); ?>;
    </script>
    <script type="text/javascript" src="scripts.js"></script>
  </body>
</html>