<?php
    if(isset($_POST['nomeOrganizador'])){

        include_once('config.php');

        $emailOrganizador = $_POST['emailOrganizador'];

        $sql = "SELECT NOME_ORGANIZADOR FROM ORGANIZADOR WHERE EMAIL_ORGANIZADOR = '$emailOrganizador'";
        $result = $conexao->query($sql);

        if(isset($_POST['submitOrg']) && (mysqli_num_rows($result) < 1))
        {


            //armazena os valoras dos formularios em variaveis
            $nomeOrganizador = $_POST['nomeOrganizador'];
            $cnpj = $_POST['cnpj'];
            $emailOrganizador = $_POST['emailOrganizador'];
            $telOrganizador = $_POST['telOrganizador'];
            $senhaOrganizador = MD5($_POST['senhaOrganizador']);

            //insere no bd
            $result = mysqli_query($conexao, "INSERT INTO ORGANIZADOR(NOME_ORGANIZADOR,CNPJ,EMAIL_ORGANIZADOR,TELEFONE_ORGANIZADOR,SENHA_ORGANIZADOR) VALUES ('$nomeOrganizador','$cnpj','$emailOrganizador','$telOrganizador','$senhaOrganizador')");
        }else{
            echo"<script>alert('Email ja cadastrado!');</script>";
        }
    }
    if(isset($_POST['text']))
    { 
        include_once('config.php');

        $email = $_POST['email'];

        $sql = "SELECT NOME_CLIENTE FROM CLIENTE WHERE EMAIL_CLIENTE = '$email'";
        $result = $conexao->query($sql);
        //se receber algo do submit
        if(isset($_POST['submit']))
        {
            if((mysqli_num_rows($result) < 1)){
                $nome  = $_POST['text'];
                $cpf = $_POST['cpf'];
                $dataNasc = $_POST['data'];
                $email = $_POST['email'];
                $SEXO = $_POST['sexo'];
                $telefone = $_POST['tel'];
                $minhasenha = MD5($_POST['password']);

                $result = mysqli_query($conexao, "INSERT INTO CLIENTE(NOME_CLIENTE,CPF,DATA_NASCIMENTO,EMAIL_CLIENTE,SEXO,TELEFONE_CLIENTE,SENHA_CLIENTE) VALUES ('$nome','$cpf','$dataNasc','$email','$SEXO','$telefone','$minhasenha')");
            }else{
                echo"<script>alert('Email ja cadastrado!');</script>";
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre sua conta</title>
    <link rel="icon" href="./imagens/event.png" type="image/png">
</head>
<body>
    
    <main>

        <section class="gifContainer">
            <img src="./images/party.gif">
        </section>

        <section class="blocoFormularios">

                <div class="titulos">

                    <p>Para criar sua conta</p>
                    <p>Insira seus dados conforme os campos abaixo:</p>
            
                </div>

                <div class="tipoDeUsuario" name="tipoDeUsuario">
                    <a name="cliente" class="ativo" onclick="selectTipoCliente()">cliente</a>
                    <a>&nbsp;|&nbsp;</a>
                    <a name="organizador" class="" onclick="selectTipoOrganizador()">Organizador</a>
                </div>

                <div class="containerInputs">
                    <form action="telaRegistro.php"  method="POST" class="clienteDados" name="clienteForm">
                        <input 
                            type="text" 
                            name="text" 
                            placeholder="insira seu nome completo"                                
                        > 

                        <input 
                            type="text" 
                            name="cpf" 
                            placeholder="insira seu cpf"                                
                        > 

                        <input 
                            type="date" 
                            name="data" 
                        >

                        <input 
                            type="email" 
                            name="email" 
                            placeholder="example@example.com" 
                            title="formato do email:example@example.com"
                        > 

                    <div class="containerSexo">
                        <label>Escolha seu sexo</label>
                        <select name = "sexo">
                            <option value = "M">Masculino</option>
                            <option value = "F">Feminino </option>
                            <option value = "O">Outro</option>
                        </select>
                    </div>
                    

                        <input 
                            type="tel" 
                            name="tel" 
                            placeholder="insira seu telefone"
                            
                            title="insira seu telefone"
                        > 

                        <input 
                            type="password" 
                            name="password" 
                            placeholder="senha"                         
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

             
                        <input 
                            type="password" 
                            name="confirmarSenha" 
                            placeholder="confirme sua senha"
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

                        <div  class="botaoLogin">
                            <button type="submit" name="submit" onclick="createCliente()"> Criar Usuario</button>
                        </div>

                        <div  class="botaoLogin">
                            <button> <a href="telaLogin.php">Ir para o login</a></button>
                        </div>
                    </form>


                    <form action="telaRegistro.php"  method="POST" class="clienteDados hidden" name="organizadorForm">
                        
                        <input 
                            type="text" 
                            name="nomeOrganizador" 
                            placeholder="insira o nome da impresa"                                
                        > 

                        <input 
                            type="text" 
                            name="cnpj" 
                            placeholder="insira o cnpj da empresa"                                
                        > 

                        <input 
                            type="email" 
                            name="emailOrganizador" 
                            placeholder="example@example.com" 
                            title="formato do email:example@example.com"
                        >                     

                        <input 
                            type="tel" 
                            name="telOrganizador" 
                            placeholder="insira seu telefone"              
                            title="insira seu telefone"
                        > 

                        <input 
                            type="password" 
                            name="senhaOrganizador" 
                            placeholder="senha"                         
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

             
                        <input 
                            type="password" 
                            name="confirmarSenhaOrganizador" 
                            placeholder="confirme sua senha"
                            title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                        > 

                        <div  class="botaoLogin">
                            <button type="submit" name="submitOrg" onclick="createOrganizador()">Criar Usuario</button>
                        </div>
                        <div  class="botaoLogin">
                            <button> <a href="telaLogin.php">Ir para o login</a></button>
                        </div>
                        
                        
                    </form>

                </div> 
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
    
    a {
    text-decoration: none;
    color: var(--vermelho);
    }
    .ativo {
        color: blue !important;
    }

    .tipoDeUsuario a:hover{
        cursor: pointer;
        font-weight: lighter;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    form input{
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

    form  input::placeholder {
        color: #999;
        font-size: 14px;
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.3s ease-in-out;
    }

    form input:focus::placeholder {
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
        margin-top: 2%;
        margin-bottom: 2%;
        
    }

    form .botaoLogin button{
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

    form .botaoLogin button:hover{
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

    // constantes para o tipo de usuario

    const tipoDeUsuario = document.querySelector('div[name="tipoDeUsuario"]');
    const cliente = tipoDeUsuario.querySelector('a[name="cliente"]');
    const organizador = tipoDeUsuario.querySelector('a[name="organizador"]');
    const form = document.querySelector('form[name="clienteForm"]');
    const orgForm = document.querySelector('form[name="organizadorForm"]');

    // constantes para o regex do cliente

    const nome = form.querySelector('input[name="text"]');
    const cpf = form.querySelector('input[name="cpf"]');
    const data = form.querySelector('input[name="data"]');
    const email = form.querySelector('input[name="email"]');
    const cel = form.querySelector('input[name="tel"]');
    const senha = form.querySelectorAll('input[type="password"]')[0];
    const confirmarSenha = form.querySelectorAll('input[type="confirmarSenha"]')[1];
    
    //regex expressoes

    const regexNome = /^[a-zA-Z]+\s+[a-zA-Z]+(\s+[a-zA-Z]+)*$/;
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
    const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const regexCel = /^\d{11}$/;
    const regexSenha = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

    // constantes para o regex do organizador 

    const nomeOrganizador = orgForm.querySelector('input[name="nomeOrganizador"]');
    const cnpj = orgForm.querySelector('input[name="cnpj"]');
    const emailOrganizador = orgForm.querySelector('input[name="emailOrganizador"]');
    const telOrganizador = orgForm.querySelector('input[name="telOrganizador"]');
    const senhaOrganizador = orgForm.querySelectorAll('input[type="senhaOrganizador"]')[0];
    const confirmarSenhaOrganizador = orgForm.querySelectorAll('input[type="confirmarSenhaOrganizador"]')[1];

    
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

    function verificaData(dataStr) {

        const [dia, mes, ano] = dataStr.split('-');
        
        const dataEnviada = new Date(`${ano}-${mes}-${dia}`);

        const dataMinima = new Date();
        
        dataMinima.setFullYear(dataMinima.getFullYear() - 10);
        
        alert('data enviada:' + dataEnviada);
        alert('data minima:' + dataMinima);
        
        if(dataEnviada < dataMinima){
            alert('Data iinvalida');
        }

    }
    
    function createCliente(){
        if (!regexNome.test(nome.value)) {
            event.preventDefault();
            alert('O nome inserido é inválido, exeplo de nome valido: Kaua da silva');
            return
        }

        if (!regexCpf.test(cpf.value)) {
            event.preventDefault();
            alert('O cpf inserido é invalido, exemplo de cpf válido: 131.656.739-77');
            return
        }

        if (!regexEmail.test(email.value)) {
            event.preventDefault();
            alert('O email inserido é invalido, exemplo de email válido: kaua.silva@outlook.com');
            return
        }

        if (!regexCel.test(cel.value)) {
            event.preventDefault();
            alert('O telefone inserido é invalido, exemplo de telefone válido: 41 995059834');
            return
        }

        if (!regexSenha.test(senha.value) || !confirmarSenha.test(senha.value)) {
            event.preventDefault();
            alert('A senha inserida é fraca, insira uma senha com 1 letra maiscula, 1 numero e com pelo menos 8 caracteres');
            return
        }

        alert(senha)
        alert(confirmarSenha)
        if (senha != confirmarSenha) {
            event.preventDefault();
            alert('Confirmar senha tem que conter a mesma senha');
            return
        }
        
    }

    function createOrganizador(){
        if (!regexNome.test(nomeOrganizador.value)) {
            event.preventDefault();
            alert('O nome inserido é inválido, exeplo de nome valido: Kaua da silva');
            return
        }

        if (!regexCpf.test(cnpj.value)) {
            event.preventDefault();
            alert('O CNPJ inserido é invalido, exemplo de CNPJ válido: 131.656.739-77');
            return
        }

        if (!regexEmail.test(emailOrganizador.value)) {
            event.preventDefault();
            alert('O email inserido é invalido, exemplo de email válido: kaua.silva@outlook.com');
            return
        }

        if (!regexCel.test(telOrganizador.value)) {
            event.preventDefault();
            alert('O telefone inserido é invalido, exemplo de telefone válido: 41 995059834');
            return
        }

        if (!regexSenha.test(senhaOrganizador.value) || !confirmarSenha.test(senha.value)) {
            event.preventDefault();
            alert('A senha inserida é fraca, insira uma senha com 1 letra maiscula, 1 numero e com pelo menos 8 caracteres');
            return
        }

    }
    
    
</script>
