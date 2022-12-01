<?php
require "connect.php";
$sql = "SELECT * FROM `p3k` WHERE 1";
$result= mysqli_query($conn,$sql) or die('Errorquery:  '.mysqli_error($conn));
$rows =array();
while($baris=mysqli_fetch_assoc($result)) 
  {
    $rows[] = $baris;
  }
  //print json_encode($rows);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SWITCH CONTROL OVER WEB</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>

   <script type="text/javascript">
    $(document).ready(function(){
      setInterval(function(){
        $.get("get.php", function(data){
            var obj = JSON.parse(data);
            for (var i = 0; i < 8; i++) {
              var id = obj[i].ID_SAKLAR;
              var waktu = obj[i].WAKTU;
              var state = obj[i].STATUS_P3KBOX1;
              var oldstate = ($("[saklar="+id+"]")[0].checked==true) ? "1" : "0" ;
              
              if (state != oldstate) {
                console.log(id + " : "+ state + " -> " + oldstate)
                if (state=="1") {
                  //$("[saklar="+id+"]").attr('checked',''); 
                  $("[saklar="+id+"]").bootstrapToggle('on');
                } else {
                  //$("[saklar="+id+"]").removeAttr('checked'); 
                  $("[saklar="+id+"]").bootstrapToggle('off');
                }
                $("[waktu=" + id + "]").text(waktu);
              }

            }
        });
      }, 500);
      
      $('[type=checkbox]').on('change.bootstrapSwitch', function(e) {
          var id = ($(e.target).attr('saklar'));
          var newstate = (e.target.checked);
          $.post("set.php",
          {
            id: id,
            state: newstate
          },
          function(data){
            $("[waktu="+id+"]").text(data);
          });
      });
    });
  </script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">SMARTHOME</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Operator 1</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-3">
      <div class="panel panel-primary" style="text-align:center" >
        <div class="panel-heading"><?=$rows[0]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[0]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[0]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[0]["ID_SAKLAR"]?>"><?=$rows[0]["WAKTU"]?></div>
      </div>
    </div>
    <div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center" >
        <div class="panel-heading"><?=$rows[1]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[1]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[1]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[1]["ID_SAKLAR"]?>"><?=$rows[1]["WAKTU"]?></div>
      </div>
    </div>
    <div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center" >
        <div class="panel-heading"><?=$rows[2]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[2]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[2]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[2]["ID_SAKLAR"]?>"><?=$rows[2]["WAKTU"]?></div>
      </div>
    </div>
	<div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center" >
        <div class="panel-heading"><?=$rows[3]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[3]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[3]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[3]["ID_SAKLAR"]?>"><?=$rows[3]["WAKTU"]?></div>
      </div>
    </div>
  </div>
</div>

<div class="container">    
  <div class="row">
    <div class="col-sm-3">
      <div class="panel panel-primary" style="text-align:center">
        <div class="panel-heading"><?=$rows[4]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[4]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[4]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[4]["ID_SAKLAR"]?>"><?=$rows[4]["WAKTU"]?></div>
      </div>
    </div>
    <div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center">
        <div class="panel-heading"><?=$rows[5]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[5]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[5]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[5]["ID_SAKLAR"]?>"><?=$rows[5]["WAKTU"]?></div>
      </div>
    </div>
    <div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center">
        <div class="panel-heading"><?=$rows[6]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[6]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[6]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" waktu="<?=$rows[6]["ID_SAKLAR"]?>"><?=$rows[6]["WAKTU"]?></div>
      </div>
    </div>
	<div class="col-sm-3"> 
      <div class="panel panel-primary" style="text-align:center">
        <div class="panel-heading"><?=$rows[7]["ID_SAKLAR"]?></div>
        <div class="panel-body" align="center"><input type="checkbox"<?=($rows[7]["STATUS_P3KBOX1"]==1)? 'checked' :''?> saklar="<?=$rows[7]["ID_SAKLAR"]?>" data-toggle="toggle" data-width="100" data-height="75"></div>
        <div class="panel-footer" style="text-align:center" waktu="<?=$rows[7]["ID_SAKLAR"]?>"><?=$rows[7]["WAKTU"]?></div>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>@adianto daring Copyright</p> 
  
</footer>

</body>
</html>
