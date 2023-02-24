<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realiza tu trabajo</title>
    <?php include 'sections/header.php'?>
</head>
<body>
<?php include 'sections/navestudiante.php'?>
<h1>Trabajos por hacer</h1>
    <div id="demo" class="principal">
       
    </div>


    <script>

        var princi = document.getElementById("demo")
        
        var peticion = new XMLHttpRequest()
        peticion.open('GET','trabajosE.php')

            peticion.onload = function(){
                
                var datos = JSON.parse(peticion.responseText)

                for(var i = 0; i < datos.length; i++){
                    var elemento = document.createElement('div')
                    elemento.setAttribute("class","ejercicios")
                    var formulario = document.createElement('form')
                    formulario.method = "POST"
                    formulario.action = "respuestas.php"
                    elemento.appendChild(formulario)
                    formulario.innerHTML += ("<h2>"+datos[i].Titulo+"</h2>")
                    var sin = document.createElement('input')
                    formulario.appendChild(sin)
                    sin.setAttribute("type", "hidden")
                    sin.setAttribute("value", datos[i].id)
                    sin.setAttribute("type", "hidden")
                    sin.setAttribute("name", "nombre")
                    var boton = document.createElement('input')
                    boton.setAttribute("type", "submit")
                    boton.setAttribute("value","Contestar")
                    formulario.appendChild(boton)
                        
                    princi.appendChild(elemento)
                } 


            }


       
       peticion.send()
       
        
      
       

    </script>


<style>

.principal{
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    
}


.ejercicios{
    width: 300px;
    margin:30px;
    height:200px;
    display: flex;
    justify-content:center;
    text-align:center
}


</style>
<?php include 'sections/scripts.php'?>


</body>
</html>