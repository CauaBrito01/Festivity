<?php


    //inicia a sessão
    session_start();



    //verifica se esxiste uma variavel email na sua sessão
    if((!isset($_SESSION['emailOrganizador']) == true) and (!isset($_SESSION['senhaOrganizador']) == true))
    {
        //caso não esxita te joga para o login e destroi os dados atuais
        unset($_SESSION['emailOrganizador']);
        unset($_SESSION['senhaOrganizador']);
        header('Location: telaLogin.php');
    }
    //caso exista cria a variavel logado e passa o valor do input de email para ela
    $logado = $_SESSION['emailOrganizador'];



    if(!empty($_GET['id']))
    {   
        //faz referencia ao config
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM organizador WHERE ID_ORGANIZADOR = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result))
            {
            $nomeOrg  = $user_data['NOME_ORGANIZADOR'];
            $telefoneOrg = $user_data['TELEFONE_ORGANIZADOR'];
            $emailOrg = $user_data['EMAIL_ORGANIZADOR'];
            $senhaOrg = $user_data['SENHA_ORGANIZADOR'];
            }

        }


        else{
            header('Location: gerenciarUsuarioOrg.php');
        }

       
        
        //insere no bd

        $sqlUpdate = "UPDATE organizador SET NOME_ORGANIZADOR='$nomeOrg',SENHA_ORGANIZADOR='$senhaOrg',EMAIL_ORGANIZADOR='$emailOrg',TELEFONE_ORGANIZADOR='$telefoneOrg'
        WHERE ID_ORGANIZADOR = '$id'";

        $result = $conexao->query($sqlUpdate);

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
    <link rel="stylesheet" href="./Styles/reset.css">
    <link rel="stylesheet" href="./Styles/header.css">
    <link rel="stylesheet" href="./Styles/footer.css">
    <link rel="stylesheet" href="./Styles/editOrg.css">

</head>
<body>
    
    <main>
    <section class="bodyID">
    <header class="headerID">
        <div class="sectionHeader">
            <div class="logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="headerTextoContainer">
                <div class="headerOptions">
                    <a href="meusEventos.php">
                        <p>Meus Eventos</p>
                    </a>
                    <a href="CadastroEvento.php">
                        <p>Cadastre um evento</p>
                    </a>
                    <a href="gerenciarUsuariosOrg.php">
                        <p>Gerenciar Usuarios</p>
                    </a>
                </div>
            </div>

            <div class="sectionLoginSearch">
                    <div class="loginEcadastro">
                        <div>
                        <?php
                            echo "<h1><u>$logado</u></h1>";
                        ?>
                        </div>
                        <div class="sair">
                            <a href="sair.php">SAIR</a>
                        </div>
                    </div>  
            </div>
            
        </div>  
    </header>   
</section>

        <div class="container">
            <div class="containerImage">
                <image src="./images/OrganizadorImage.png">
            </div>
        

            <div class="inputs">
                <h2>Editar dados da Conta</h2>

                <form class="editarDadosCampos" action="saveEditOrg.php"  method="POST" class="clienteDados" name="clienteForm">
                    <input
                        value=<?php echo $nomeOrg;?>
                        type="text" 
                        name="nomeOrg" 
                        placeholder="insira seu nome completo"                                
                    >

                    <input
                        value=<?php echo $emailOrg;?>
                        type="email" 
                        name="email" 
                        placeholder="example@example.com" 
                        title="formato do email:example@example.com"
                    >


                    <input
                        value=<?php echo $senhaOrg;?>
                        type="password" 
                        name="password" 
                        placeholder="senha"                         
                        title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                    > 

                    <input
                        value=<?php echo $telefoneOrg;?>
                        type="tel" 
                        name="tel" 
                        placeholder="insira seu telefone"
                        title="insira seu telefone"
                    >

                    

                    <input type="hidden" name="idOrg" value=<?php echo $id;?>>

                    <div class="buttonContainer">

                        <button type="submit" name="updateOrg" id="updateOrg" onclick="createCliente()"> Salvar Alterações</button>        
                        <button> Voltar Pagina</button>
                        
                        
                    </div>

                </form>

            </div>
        </div>
        

                    
                                   
                        
                        <div  class="botaoLogin">
                            
                        </div>


    </main>
    
</body>
</html>


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