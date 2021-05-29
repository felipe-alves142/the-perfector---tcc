<?php
    session_start();
    include("includes/dbh.inc.php");
    $nome= strval($_SESSION["useruid"]);
    
    $sql="SELECT * FROM orcamento,pedido WHERE (idOr LIKE Peid) AND pedidoUser = '$nome' AND status = 'Recebido';";
    $stmt=mysqli_stmt_init($conn);
    $con= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $_SESSION['telefone']=$ph=5511910206964;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1,user-scalable=no">
    <meta name="HandheldFriendly" content="true">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/icon" href="../imagens/logo-icon.svg"> 
    <link rel="stylesheet" href="../styles/dashboar.css">
    <link rel="stylesheet" href="../styles/foote.css">
    
</head>
<body>
<script>
  function showPage(page){
					document.querySelectorAll('section').forEach(section => {
						section.style.display = 'none';
					})
					document.querySelector(`#${page}`).style.display = 'block';
				}
					
					document.addEventListener("DOMContentLoaded" , function(){
					   //evento que faz esperar todo conteudo da página carregar
						document.querySelectorAll("a").forEach(a => {
					
						//Seleciona a query button e faz um loop	
						 a.onclick= function(){
							 // esse loop vai mostrar ou desaparecer de acordo com o borao selecionado
							 showPage(this.dataset.page);
						 }
				   })
				  })
				
		

</script>
    <style>
            a{
                text-decoration: none;
                color: black;
            }
            footer{
            top:1000px;
            height: 200px;
            }
    </style>
    
   <div id="topdash" style="display:block;">
        <ul>
         <li><a href="display.php" style="text-decoration:none" >Explorar</a></li>
         <li><a href="categorias.php" style="text-decoration:none">Categorias</a></li>
         <?php include_once "includes/menu.php";?>   
        </ul> 
        
        
        <!--<li><img id="prof" src="../imagens/usuario.png"></li>-->
       
        <ul id="subm">    
            <?php
              echo "<li><a href='dashboardEmpresa.php'>Empresa</a></li><br>";  
              echo "<li><a href='profile.php'>Perfil</a></li><br>";      
              echo "<li><a href='includes/logout.inc.php'>Sair</a></li><br>";
                
            ?>
            
  </ul>
  
        <div id="primary">
    <?php
        include_once "includes/footer.php";          
          if(isset($_SESSION["userid"])){
              include_once "includes/functions.inc.php";
              echo "<p id='bvd'>Bem Vindo(a) ".$_SESSION["useruid"]."</p>";
             
             }

    ?>
    <br>
    </div>
    <ul>
        <li id="re"><a   href="#" style="text-decoration:none" data-page="page1"><p>  Recebidos</p> </a></li>
        <li id="ap"><a   href="#" style="text-decoration:none" data-page="page2"> <p>  Aprovados</p></a></li>
        <li id="fi"><a   href="#" style="text-decoration:none" ><p>Finalizado</p></a></li>
        
    </ul>
    <?php 
    echo "<a href='https://web.whatsapp.com/send?phone= $_SESSION[telefone];' target='blank'><img id='chat' src='../imagens/chat.png'></a>"    ?>
    <a href="pedido.php"><img id="cpe" src="../imagens/cpedido.png"></a>
    <br><br>
 
        <section id="page1">
        <?php while($dado = $con -> fetch_array()){
        ?>
        
        <?php 
        
        echo "<div  id='meio'><tr ><td >Enviado por:".$dado["userOR"]."</td> <br>";
        echo "<td >Valor:$".$dado['orca']."</td>";
        echo "<a style='position:absolute; top:25px;left:175px;' href='detalhes.php?codigo=$dado[Peid]'>
            
        <img src='../imagens/Vector.png'>       
        <img style='position:absolute; left: 90px; top:70px; height: 50px;' src='../imagens/ant-design_plus-circle-outlined.png'>

    </a></div>";
            
        echo " </tr><br>";
        
        
        ?>

            
    
    
    <?php }?>  
        </section>
    
    <section id="page2" style="display:none;">
    <?php
      
        include_once "includes/finalizados.php";
      ?>
        </div>  

</body>
</html>