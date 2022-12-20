<?php  
include_once ("../include/verificaAcesso.php"); 
include_once ('../include/ConexaoBanco.php');?>
<?php 
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }

?>

<?php 
$menorque10  = 0;
$maiorque10  = 0;
$maiorque500  = 0;
$maiorque1000  = 0;
$resultado_query = "SELECT (Quantidade * precoUn) Valor from pedidoitem";   
$result_query = mysqli_query($conexao,$resultado_query);
while($row_valor = mysqli_fetch_assoc($result_query)) {
    if($row_valor['Valor'] <= 10){
        $menorque10++;
    } else if($row_valor['Valor'] >= 10 and $row_valor['Valor'] < 500) {
        $maiorque10++;
    }else if ($row_valor['Valor'] >= 500 and $row_valor['Valor'] < 1000) {
        $maiorque500++;
    } if($row_valor['Valor'] >= 1000) {
        $maiorque1000++;
    };
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../scripts/script.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="../Imagens/favicon.ico" type="image/x-icon">

    <title>Sistema Gerenciador para Pizzaria</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Menor de 10 Reais',     <?= $menorque10 ?>],
          ['Maior de 10 Reais',      <?= $maiorque10 ?>],
          ['Maior de 500 Reais',  <?= $maiorque500 ?>],
          ['Maior de 1000 Reais', <?= $maiorque1000 ?>],
          ['Sleep',    0]
        ]);

        var options = {
          title: 'Gráficos dos dos valores dos pedidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Menor de 10 Reais',     <?= $menorque10 ?>],
          ['Maior de 10 Reais',      <?= $maiorque10 ?>],
          ['Maior de 500 Reais',  <?= $maiorque500 ?>],
          ['Maior de 1000 Reais', <?= $maiorque1000 ?>],
          ['Sleep',    0]
        ]);

        var options = {
          title: 'Gráficos dos dos valores dos pedidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body class="w3-light-grey">
  <div class="w3-padding w3-content w3-third  w3-display-topright">
    <form action="../include/logoutAction.php" class="w3-container" method='post'>
        <button name="btnLogout" class="w3-button w3-red w3-cell w3-round-large w3-right w3-margin-right">
            <i class="w3-xxlarge fa fa-times-rectangle"> </i> Sair
        </button>
    </form>
</div>
<div class='col-lg-12 d-flex justify-content-between align-items-center'>
                <button class='w3-bar-item w3-button'><a href='../Menu/menu.php' class=''> <i class='fa fa-arrow-circle-left w3-bar-item w3-large w3-teal w3-large'></i> </a></button> 
</div>


<h1 class="w3-center w3-green"><span>Gráficos</span></h1>
<div class="w3-bar w3-blue">
  <button class="w3-bar-item w3-button" onclick="openCity('ValorDosPedidos')"><i class="fa fa-bar-chart" aria-hidden="true"></i> Valores Dos Pedidos</button>
 <!--  <button class="w3-bar-item w3-button" onclick="openCity('OpiniaoClientes')"><i class="fa fa-bar-chart" aria-hidden="true"></i>Opinião dos Clientes</button>
 <button class="w3-bar-item w3-button" onclick="openCity('Produtos')"><i class="fa fa-coffee" aria-hidden="true"></i> Produtos</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Clientes')"><i class="fa fa-user-o" aria-hidden="true"></i> Clientes</button>
  <button class="w3-bar-item w3-button" onclick="openCity('Pedidos')"><i class="fa fa-file-text-o" aria-hidden="true"></i> Pedidos</button>
  <button class="w3-bar-item w3-button input2" onclick="openCity('Usuario')"><i class="fa fa-user-o" aria-hidden="true"></i> Usuarios</button>
  <button class="w3-bar-item w3-button input2" onclick="openCity('Graficos')"><i class="fa fa-bar-chart" aria-hidden="true"></i> Gráficos</button>-->

</div>
    <div id="ValorDosPedidos" class="w3-container city">
      <div id="piechart"  class="w3-light-grey" style="width: 1400px; height: 500px;"></div>
      <!--width: 900px; height: 500px;--->
    </div>

 <!--   <div id="OpiniaoClientes" class="w3-container city" style="display:none">
      <div id="piechart1"  class="w3-light-grey" style="width: 1400px; height: 500px;"></div>
      width: 900px; height: 500px;--->
    </div>
    </body>
</html>  