<!DOCTYPE html>
<html lang="en">
<head>
<title>SistEduc</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<link rel="sortcut icon" href="./img/logo1.png" type="image/x-icon" />
<body>
<!--NAV BAR-->
<div class="topnav">
    <a href="index.php"><img class="img" src="./img/logo1.png" alt="" href="index.html"></a>  
    <a href="Sobre.php">Sobre</a>
    <a href="login.php">Login</a>
    <a href="areaAluno.php">Area do Aluno</a>
</div>
<!-- FIM NAV BAR-->


<!--Carrosel de imagens-->
<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicadores -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/slideone.png" alt="slide1" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="./img/slide2.jpg" alt="slide2" width="1100" height="500" >
      </div>
      <div class="carousel-item">
        <img src="./img/slide3.jpg" alt="slide3" width="1100" height="500" >
      </div>
    </div>
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
<!--Fim do carrossel-->

<section>
  <div class="content">
    <h2>SisteEduc</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere risus ex, quis pharetra ex vehicula quis. Proin pulvinar augue eu elementum varius. 
      Duis auctor, augue quis scelerisque porttitor, neque elit condimentum arcu, a pretium odio enim sit amet justo. 
      Vivamus ac laoreet justo. Aenean convallis ligula lorem, nec fermentum nibh vehicula vel. Integer facilisis mauris quis cursus ullamcorper. 
      Etiam eros dolor, lacinia vitae eleifend quis, accumsan eu nisl. Ut placerat, purus ac vestibulum maximus, est felis congue nisi, non aliquet ligula massa non ante. 
      Donec efficitur lacinia sapien, et faucibus neque vehicula et.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere risus ex, quis pharetra ex vehicula quis. Proin pulvinar augue eu elementum varius. 
          Duis auctor, augue quis scelerisque porttitor, neque elit condimentum arcu, a pretium odio enim sit amet justo. 
          Vivamus ac laoreet justo. Aenean convallis ligula lorem, nec fermentum nibh vehicula vel. Integer facilisis mauris quis cursus ullamcorper. 
          Etiam eros dolor, lacinia vitae eleifend quis, accumsan eu nisl. Ut placerat, purus ac vestibulum maximus, est felis congue nisi, non aliquet ligula massa non ante. 
          Donec efficitur lacinia sapien, et faucibus neque vehicula et.</p>
  </div>
</section>
<div id="card2">
    <div class="card-deck">
      <div class="card">
        <img src="./img/card1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Sistema de Gestão Escolar</h5>
          <p class="card-text">Como você bem sabe, é necessário realizar várias tarefas burocráticas na gestão escolar. Afinal, todo o histórico do aluno precisa ser devidamente armazenado para documentar sua trajetória educacional.</p>
        </div>
      </div>
      <div class="card">
        <img src="./img/card2.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Diminuição da evasão	escolar</h5>
          <p class="card-text">A evasão escolar é uma triste realidade em muitas instituições de ensino no Brasil. Apesar de sua ocorrência se dar por diversos motivos, atualmente, ela está bastante relacionada à falta de investimento em tecnologias — o que, geralmente, torna o ensino desinteressante.</p>
        </div>
      </div>
      <div class="card">
        <img src="./img/card3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Auxilia a gestão pedagógica</h5>
          <p class="card-text">Além disso, possibilita outras conveniências, como o registro de frequência e o diário on-line, a elaboração de planos de aula, a emissão de documentos pedagógicos, o mapeamento da sala e a distribuição dos professores, um sistema de avaliação configurável e a gestão de biblioteca, por exemplo.</p>
        </div>
      </div>
    </div>
  </div>
<!--Fim dos cards-->

<footer class="footer" id="footer2">
    <div style="margin-top: 40px;">
        <i class="fa fa-phone-square" aria-hidden="true"></i> 
        <a style="color:black !important;">Fone: (98)9-4002-8922 - <i class="fa fa-whatsapp" aria-hidden="true"></i> (98)98725-6598</a><br>
        <i class="fa fa-instagram " aria-hidden="true"> @SistEduc</i><br>
        <i class="fa fa-envelope" aria-hidden="true"> sisteduc@gmail.com</i>
    </div>
    <div id="footertxt">Desenvolvido por Nova Web &copy;</div>
</footer>
</body>
</html>
