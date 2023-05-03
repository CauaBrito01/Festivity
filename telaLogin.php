<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logue em sua conta</title>
    <link rel="icon" href="./imagens/event.png" type="image/png">
</head>
<body>
    
    <main>

        <section class="gifContainer">
            <img src="./images/party.gif">
        </section>

        <section class="blocoFormularios">
            
                <div class="titulos">

                    <p>Para logar em sua conta</p>
                    <p>Insira seus dados conforme os campos abaixo:</p>
            
                </div>

                
                <div class="tipoDeUsuario" name="tipoDeUsuario">
                    <a name="cliente" class="ativo" onclick="selectTipoCliente()">cliente</a>
                    <a>&nbsp;|&nbsp;</a>
                    <a name="organizador" class="" onclick="selectTipoOrganizador()">Organizador</a>
                </div>

                <div class="containerInputs">
                    <form action="testLogin.php" method= "POST" name="clienteForm">
                    
                        
                        <input 
                            class="input" 
                            type="email" 
                            name="email" 
                            placeholder="example@example.com" 
                            title="formato do email:example@example.com"
                        > 

                        
                        <input
                            class="input" 
                            type="password" 
                            name="password" 
                            placeholder="senha"                         
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

                        <div  class="botaoLogin">
                            <input class="inputSubmit" type="submit" name="submit" value="Enviar" onclick="logarCliente()">
                        </div>
                        <div  class="botaoLogin">
                            <button type="submit" name="submitOrg" ><a href="./telaRegistro.php">Registrar Usuario</a> </button>
                            
                        </div>
                    </form>

                    <form class="orgForm hidden" name="organizadorForm">
                      
                        <input 
                            type="text" 
                            name="cnpj" 
                            placeholder="insira o cnpj da empresa"                                
                        > 

                        
                        <input 
                            type="password" 
                            name="senhaOrganizador" 
                            placeholder="senha"                         
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

                        <div  class="botaoLogin">
                            <button type="submit" onclick="logarOrganizador()">Logar</button>
                        </div>

                        <div class="botaoLogin">
                            <button type="submit" name="submitOrg">Registrar Usuario</button>
                            
                        </div>
                    </form>


                </div> 
        </section>

        <section class="gifContainer">
            <img src="./images/party.gif">
        </section>

    </main>

</body>
</html>

<style>

    @import url('https://fonts.googleapis.com/css?family=Helvetica+Neue');

    *
    {
        margin: 0;
        padding: 0;
        font-family: 'Helvetica Neue', sans-serif;
    }

    :root {
        --cinzaEscuro: #16171b;
        --cinzaClaro: #222327;
        --white: #f1efef;
        --vermelho: #bb432c;
    }

    .hidden{
        display: none;
    }

    main{
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: var(--cinzaEscuro);
    }

    .blocoFormularios{
        width: 400px;
        background-color: var(--cinzaClaro);
        border-radius: 10px;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    form .input {
        width: 50%;
        margin-top: 5%;
        border: none;
        color: var(--white);
        border-bottom: 1px solid #ccc;
        outline: none;
        height: 20px;
        font-size: 16px;
        background: none;
    } 

    form  .input::placeholder {
        color: #999;
        font-size: 14px;
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.3s ease-in-out;
    }

    form .input:focus::placeholder {
        top: -20px;
        font-size: 12px;
        color: #333;
    }

    form .containerSexo{
        display: flex;
        flex-direction: column;
        margin-top:5%;
        width: 50%;
    }

    form .containerSexo label{
        margin-bottom:5%;
        text-align: left;
        color: var(--white);
    }

    form .containerSexo select{
        border: none;
        border-radius: 4px;
        font-size: 16px;
        color: #333;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.2s ease-in-out;
    }

    form .botaoLogin{
        margin-top: 5%;
        margin-bottom: 5%;
    }

    form .botaoLogin .inputSubmit{
        color: var(--vermelho);
        border: none;
        border-radius: 4px;
        padding: 12px 24px;
        font-size: 16px;
        cursor: pointer;
        background-color: var(--cinzaClaro);
        transition: all 0.3s ease-in-out;
        border: 2px solid var(--vermelho);
    }

    form .botaoLogin .inputSubmit:hover{
        background-color: var(--vermelho);
        color: var(--white);
    }

    .titulos{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top:5%;
        margin-bottom:5%;
    }

    .titulos p{
        line-height:20px;
        font-weight: bolder;
        font-size: 15px;
        color: var(--vermelho);
    }

    .gifContainer{
        width:200px;
    }

    .gifContainer img {
        width:200px;
    }

    
    .tipoDeUsuario{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    

    .tipoDeUsuario a{
        line-height:20px;
        font-weight: bolder;
        font-size: 15px;
        color: var(--white);
    }

    .ativo {
        color: blue !important;
    }

    .tipoDeUsuario a:hover{
        cursor: pointer;
        font-weight: lighter;
    }

    @media screen and (max-width:1100px){
        
        main{
            justify-content: center;
            align-items: center;
        }

        .blocoFormularios {
            margin-right: 0;
            width:80%;
        }

        .gifContainer{
            display: none;
        }
 
    }

</style>

<script>

    //constantes de usuario

    const tipoDeUsuario = document.querySelector('div[name="tipoDeUsuario"]');
    const cliente = tipoDeUsuario.querySelector('a[name="cliente"]');
    const organizador = tipoDeUsuario.querySelector('a[name="organizador"]');
    const form = document.querySelector('form[name="clienteForm"]');
    const orgForm = document.querySelector('form[name="organizadorForm"]');

    //constantes de regex cliente

    const email = form.querySelector('input[name="email"]');
    const senha = form.querySelectorAll('input[type="password"]')[0];

    //constantes de regex organizador
    const cnpj = form.querySelector('input[name="cnpj"]');
    const senhaOrganizador = form.querySelectorAll('input[type="senhaOrganizador"]')[0];

    //regex expressoes
    
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const regexSenha = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
    
    function logarCliente(){

        if (!regexEmail.test(email.value)) {
            event.preventDefault();
            alert('O email inserido é invalido, exemplo de email válido: kaua.silva@outlook.com');
        }

        if (!regexSenha.test(senha.value)) {
            event.preventDefault();
            alert('A senha inserida é incorreta.');
        }

    }

    function logarOrganizador(){

        if (!regexEmail.test(cnpj.value)) {
            event.preventDefault();
            alert('O cpnj inserido é invalido');
        }

        if (!regexSenha.test(senhaOrganizador.value)) {
            event.preventDefault();
            alert('A senha inserida é incorreta.');
        }

    }

    function selectTipoCliente(){
        cliente.classList.add("ativo");
        organizador.classList.remove("ativo");
        form.classList.remove("hidden");
        orgForm.classList.add("hidden");
    }

    function selectTipoOrganizador(){
        organizador.classList.add("ativo");
        cliente.classList.remove("ativo");
        form.classList.add("hidden");
        orgForm.classList.remove("hidden");
    }
    
    
</script>