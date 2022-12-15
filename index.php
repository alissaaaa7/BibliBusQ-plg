<?php
   include_once "biblibusq.php";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title> BibliBusQ </title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<style>

.horario {
  padding-left: 400px;
  font-size: 15px;
  color: #3a5a40;
}

html, body {
  
  height: 100%;
  width: 100%;
  font-family: 'Roboto Slab', serif;
  background-image: linear-gradient(to bottom, 
#023e8a,#457b9d );
}

.campo {
  background: none;
  border: none;
  border-bottom: 1px solid white;
  outline: none;
  color: white;
  font-size: 18px;
  width: 80%;
  letter-spacing: 1.5px;
}

.result {
  color:#fff;
  margin:0;
  padding: 10px 100px 10px 100px;
  background-color: #003566;
}

</style>


  <div class="top-bar">

    

      <span> CENTRO ESTADUAL DE EDUCAÇÃO PROFISSIONAL PROFESORRA LOURDINHA GUERRA</span>

    

  </div>

  <nav>

    <div class="home">

      <div >
         <div class="logo">
         <a href="#" ><img src="Q.png" alt="logo">Sistema de Busca Biblioteca PLG</a>
    <p class="horario">Horário de Funcionamento da Biblioteca: 
      Das 7h30min às 15h</p>
      
      </div>

    </div>


    </div>
  </nav>

  <br><br>

  <div class="box">

    <form class="pesquisa" action="" method="POST">

      <fieldset>

        <legend>
          Busque a obra conforme os campos preenchidos
        </legend>

        <br><br>
        

        <div class="inputbox">
          <input type="text" value="" name="titulo" class="campo">
          <label a= "" for="titulo" class="labelinput"><b>Título da obra:</b></label>

          <br><br>
        </div>
        
        <div class="inputbox">
          <input type="text" value="" name="autor" class="campo">
          <label for="fname" class="labelinput"> <B>Autor</B>: </label>
       
          <br><br>
         </div>

        <div class="btn">

          <input type="submit" value="BUSCAR" class="btn-all" id="seach">
          <input type="submit" value="LIMPAR" class="btn-all" id="clear" onclick="limparForm();">
          <input type="submit" value="CANCELAR" class="btn-all" id="cancel">
        </div>

      </fieldset>

    </form>
    

  </div>
  
  <br><br><br>


     <?php
  if(!empty($_POST['titulo']) && !empty($_POST['autor'])){

		$result_livro = 
    "SELECT * FROM livro 
    WHERE titulo LIKE '%$titulo%' or autor LIKE '%$autor%' 
    LIMIT 10";

		$resultado_livro = mysqli_query($conn, $result_livro);

		$verifica = mysqli_num_rows($resultado_livro);

	}elseif(!empty($_POST['titulo'])){

		$result_livro = 
    "SELECT * FROM livro 
    WHERE titulo LIKE '%$titulo%' 
    LIMIT 10";

		$resultado_livro = mysqli_query($conn, $result_livro);

		$verifica = mysqli_num_rows($resultado_livro);

	}elseif(!empty($_POST['autor'])){	

		$result_livro = "SELECT * FROM livro
     WHERE autor LIKE '%$autor%' 
     LIMIT 10";

		$resultado_livro = mysqli_query($conn, $result_livro);

		$verifica = mysqli_num_rows($resultado_livro);	
	}
	echo "<div class='result'>";
	if($verifica > 0){
    echo "<h2 class='result-text'>Resultados da Pesquisa</h2><hr>";
		while($rows_livro = mysqli_fetch_array($resultado_livro)){

         
			   echo  "Título:".$rows_livro['titulo']."<br>";
			   echo "Autor:".$rows_livro['autor']."<br>";
         echo "Quantidade: ".$rows_livro['quantidade']."<br>";
         echo "Ano de Lançamento: ".$rows_livro['ano']."<br>";
         echo "Localização: ".$rows_livro['localizacao']."<br>";
         echo "Gênero: ".$rows_livro['genero']."<hr>";

		}
	}else{
		echo "<h2>Nenhum livro foi encontrado</h2>";
	}
	echo"</div>";
	 ?>

</table>

</body>

</html>



    
  
