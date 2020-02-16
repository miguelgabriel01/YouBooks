<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>thoughts</title>
    <link rel="stylesheet" type="text/css" href="css/index.css"/>  
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Pacifico&display=swap" rel="stylesheet">
 </head>
<body>
  <header class="menu" >
     <a href="#" >You books</a>
       <nav>
          <li><a href="#" >Inicio</a></li>
          <li><a href="#">Entrar</a></li>
          <li><a href="#" @click="show = !show">Cadastrar</a></li>
           
                 <!--Form de cadastro de usuario  !-->
           <transition name="slide-fade">
             <div v-if="show">
               <div class="principal2">
                  <h2>Cadastro</h2>
              
                  <form id="login" action="cadastrar.php" method="POST">
                    <div class="meio">
                      <input class="ipt" type="text" name="nome" placeholder="Primerio e segundo nome" >
                      <label>Primerio e segundo nome</label>
                    </div> 
                    <div class="meio">
                      <input class="ipt" type="text" name="email" placeholder="Email" >
                      <label>Email</label>
                    </div> 
                    <div class="meio">
                      <input class="ipt" type="password" name="senha" placeholder="Senha">
                      <label>Senha</label>
                    </div>    
                    <div class="meio">
                      <input class="ipt" type="password" name="senha2" placeholder="Confirmar senha">
                      <label>Confirmar senha</label>
                    </div>  
                   
                     <input type="submit" name="" value="Salvar">
                  
                  </form>
                </div>
             </div>
        
            </transition>
        </nav>
    </header>

  <section class="inicio">

     <!--Mensagem inicial  !-->
     <p id="mensagemInicial">Welcome to the largest book registration platform in Brazil. come in and find the missing words in your life</p>
        
     <!--Botão que dá inicio ao evento que mostra o form de login  !-->
     <button id="Bntlogin" @click="show = !show">login</button>
        
        <!--Form de login de usuario já cadastrado  !-->
        <transition name="slide-fade">
          <div v-if="show">
            <div class="principal">
             <h2>Login</h2>
      
              <form id="login" action="login.php" method="POST">
                <div class="meio">
                  <input class="ipt" type="email" name="email" placeholder="Email">
                  <label>Email</label>
                </div> 
                <div class="meio">
                  <input class="ipt" type="password" name="senha" placeholder="Senha" maxlength="15">
                  <label>Senha</label>
                </div>    
      
                 <input type="submit" name="" value="Entrar">
                 <!--Botão que desativa o formulario de login  !-->
                 <!--<button @click="show = !show">Sair</button>!-->
              </form>
            </div>
          </div>
        </transition>

      </section>

        <!--Texto do maio onde pode se passar alguma informação ao usuario  !-->
    <section class="meioTEXT"><p id="texto">"She seems dressed in all of me
        Stretched across my shame
        All the torment and the pain
        Leaked through and covered me
        I'd do anything to have her to myself
        Just to have her for myself
        Now I don't know what to do
        I don't know what to do
        When she makes me sad"</p></section>
    
        <!--
       <section class="img">

          <a href="https://www.bibliaonline.com.br/acf" ><div id="img1"></div></a>
          <a href="https://crmpiperun.com/blog/frases-motivacionais/" ><div id="img2"></div></a>
          <a href="https://www.youtube.com/results?search_query=ed+sheeran+live+legendado" ><div id="img3"></div></a> 
       
        </section>
        !-->

        <!--Footer final com link para o github do criador  !-->
        <section class="fim">
          <a id="footmsg" href="https://github.com/miguelgabriel01">mgbs@distribuição ltda</a>
        </section>



    <!--escript para fazer a transição do form de cadastro e login ultilizando vue js  !-->
   <script src="https://cdn.jsdelivr.net/npm/vue"></script>
   <script>
     new Vue({
        el:".inicio",
        data: {
        show:false
      }
    })

    new Vue({
       el:".menu",
       data: {
       show:false
     }
    })

  </script>
</body>
</html>