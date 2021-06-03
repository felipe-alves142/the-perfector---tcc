
  
<?php   
    session_start();
    include("includes/dbh.inc.php");
    $sql="SELECT * FROM pedido,orcamento WHERE status='Recebido' LIMIT 4;";
    $stmt=mysqli_stmt_init($conn);
    $con= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="shortcut icon" href="../imagens/logo-icon.svg" type="image/x-icon">

    <title>Display</title>
</head>
<body>

<style>
#da{
    position:relative; 
    left:700px;
    padding-right: 100px;
    width: 400px;
    box-shadow: 5px 4px 6px 1px rgba(0, 0, 0, 0.25);
    height: 300px;
    top: 200px;
    background-color: #E1EFFB;
    border-radius: 10px;
        }   
#d{
    position: absolute;
    left:330px;
    top: 235px;
    height: 10px;
}
h6{
    position: relative;
    left:100px;
    top:20px;
}
p{
    position: relative;
    left:110px;
    top:20px;
    width: 0;
    padding:0;
    display: inline;
    padding-bottom: 0%;

}
#filtro{
    position:fixed;
     border-radius:15px; 
     left: 80px;
     padding:20px; 
     top:250px; 
     width:300px;
     height: 350px;
     background-color:#E1EFFB;
     margin: 0;
}

a{
            text-decoration: none;
            color: black;
}
input{
    border-radius: 7px;
    border: 0;
}
footer{
    top:1000px;
    height: 200px;
}
</style>
   <a href="dashboard.php"> <img src="../imagens/back-button.png" style="position:fixed; top:10px; width:180px;"> </a>
    <h5 style="position:fixed; top:60px; margin-top:100px; margin-bottom:100px; margin-left:180px;">Pedidos Enviados</h5> 
    <div id="filtro">
        <form action="display.php" method="post">
            <h4>Filtrar Serviços</h4>
                <input type="text" name="filtrar">
            <h4>Sub-Categoria:</h4>
                <input type="text" name="Sub-categoria">
            
            <h4>Orcamento:</h4>
                <select >
                    <option name="orca" value="Menos de R$ 300,00" selected>Menos de R$ 300,00</option>
                    <option value="R$ 301,00 à R$ 500,00">R$ 301,00 à R$ 500,00</option>
                    <option value="R$ 501,00 à R$ 800,00">R$ 501,00 à R$ 800,00</option>
                    <option value="R$ 801,00 à R$ 1200,00">R$ 801,00 à R$ 1200,00</option>
                    <option value="R$ 1200,00">R$ 1200,00</option>
                </select> <br> 
                  <input type="submit">   
        </form>
    </div>
   <table> 

    
        <?php while($dado = $con -> fetch_array()){ 
 
                  $codigo =$dado['Peid'];
                  $_SESSION['co']=$codigo;
                   
              
                 
                     echo "<div id='da'>";  
                            echo '<p> <strong>Enviado por:</strong>'.$dado["pedidoUser"].'</p> <br> <br>';
                            echo "<h6>Titulo</h6>";   
                            echo '<p>'.$dado["titulo"].'</p> <br>';
                            echo "<h6>Categoria</h6>";
                            echo '<p>'.$dado["categoria"].'</p>';
                            echo "<h6>Subcategoria</h6>";
                            echo '<p>'.$dado["suB"].'</p><br>';
                            echo "<h6>Descrição</h6>";
                            echo '<p>'.$dado["descricao"].'</p><br>';
                         
                            // echo "<h6>Id</h6>";
                            
                            //    echo '<p>'.$dado["Peid"].'</p><br> <br>'; 
                            echo "<a id='d' href='mais.php?codigo=$dado[Peid]'><svg width='50' height='50' viewBox='0 0 67 66' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M45.3789 30.9375H35.582V21.1406C35.582 20.857 35.35 20.625 35.0664 20.625H31.9727C31.6891 20.625 31.457 20.857 31.457 21.1406V30.9375H21.6602C21.3766 30.9375 21.1445 31.1695 21.1445 31.4531V34.5469C21.1445 34.8305 21.3766 35.0625 21.6602 35.0625H31.457V44.8594C31.457 45.143 31.6891 45.375 31.9727 45.375H35.0664C35.35 45.375 35.582 45.143 35.582 44.8594V35.0625H45.3789C45.6625 35.0625 45.8945 34.8305 45.8945 34.5469V31.4531C45.8945 31.1695 45.6625 30.9375 45.3789 30.9375Z' fill='#2AE876'/>
                            <path d='M33.5195 4.125C17.5738 4.125 4.64453 17.0543 4.64453 33C4.64453 48.9457 17.5738 61.875 33.5195 61.875C49.4652 61.875 62.3945 48.9457 62.3945 33C62.3945 17.0543 49.4652 4.125 33.5195 4.125ZM33.5195 56.9766C20.2809 56.9766 9.54297 46.2387 9.54297 33C9.54297 19.7613 20.2809 9.02344 33.5195 9.02344C46.7582 9.02344 57.4961 19.7613 57.4961 33C57.4961 46.2387 46.7582 56.9766 33.5195 56.9766Z' fill='#2AE876'/>
                            </svg>
                            </a>";   
                    
                     echo "</div> <br>";   
                    
                     ?>
                <td></td>
                


            </tr>
            <tr>
                <td style="background-color:white;"></td>
                <td style="background-color:white;"></td>
                <td style="background-color:white;"></td>
                <td style="background-color:white;"></td>
            </tr>  
            
            <?php };
                    //   include_once "includes/footer.php";
            ?>
   </table> 
   
</body>
</html>