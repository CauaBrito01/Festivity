<?php
        //inicia a sessão
    session_start();
    

    //verifica se esxiste uma variavel email na sua sessão
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true))
    {
        //caso não esxita te joga para o login e destroi os dados atuais
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: telaLogin.php');
    }
    //caso exista cria a variavel logado e passa o valor do input de email para ela
    $logado = $_SESSION['email'];
    if(!empty($_GET['id']))
    {   
        //faz referencia ao config
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cliente WHERE Id_cliente = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result))
            {
            $nome  = $user_data['NOME_CLIENTE'];
            $cpf = $user_data['CPF'];
            $dataNasc = $user_data['DATA_NASCIMENTO'];
            $email = $user_data['EMAIL_CLIENTE'];
            $SEXO = $user_data['SEXO'];
            $telefone = $user_data['TELEFONE_CLIENTE'];
            $minhasenha = $user_data['SENHA_CLIENTE'];
            }

        }


        else{
            header('Location: gerenciarUsuario.php');
        }

       
        
        //insere no bd

        $sqlUpdate = "UPDATE cliente SET NOME_CLIENTE='$nome',SENHA_CLIENTE='$minhasenha',EMAIL_CLIENTE='$email',DATA_NASCIMENTO='$dataNasc',TELEFONE_CLIENTE='$telefone'
        WHERE Id_cliente = '$id'";

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
    <link rel="stylesheet" href="./Styles/edit.css">
    <link rel="stylesheet" href="./Styles/header.css">
'    <link rel="stylesheet" href="./Styles/reset.css">
'
</head>
<body>
<section class="bodyID">
    <header class="headerID">
        <div class="sectionHeader">
            <div class="logo">
                <img src="./images/logo.png" alt="">
            </div>
            <div class="headerTextoContainer">
                <div class="headerOptions">
                    <a href="home.php">
                        <p>Home</p>
                    </a>
                    </a>
                    <a href="gerenciarUsuarios.php">
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

            <div class="inputs">
                <h2>Editar dados da Conta</h2>

                <form class="editarDadosCampos" action="saveEdit.php"  method="POST" class="clienteDados" name="clienteForm">
                    <label>Nome:</label>
                    <input
                        value=<?php echo $nome;?>
                        type="text" 
                        name="text" 
                        placeholder="insira seu nome completo"                                
                    >

                    
                    <label>Cpf</label>
                    <input
                        readonly
                        value=<?php echo $cpf;?>
                        type="text" 
                        name="cpf" 
                        placeholder="insira seu cpf"                                
                    > 

                    <label>Data de nascimento</label>
                    <input
                        value=<?php echo $dataNasc;?>
                        type="date" 
                        name="data" 
                    >

                    <label>Email:</label>
                    <input
                        value=<?php echo $email;?>
                        type="email" 
                        name="email" 
                        placeholder="example@example.com" 
                        title="formato do email:example@example.com"
                    >          

                    <label>Cpf</label>
                    <input
                        value=<?php echo $telefone;?>
                        type="tel" 
                        name="tel" 
                        placeholder="insira seu telefone"
                        
                        title="insira seu telefone"
                    > 

                    <label>Senha:</label>
                    <input
                        value=<?php echo $minhasenha;?>
                        type="password" 
                        name="password" 
                        placeholder="senha"                         
                        title="sua senha tem que ter 1 simbolo 1 letra maiscula e pelo menos 8 caracteres"
                    > 

                        <input type="hidden" name="id" value=<?php echo $id;?>>

                        <div class="buttonContainer">
                        <button type="submit" name="update" id="update" onclick="createCliente()"> Salvar Alterações</button>
            
                            <button>Voltar Pagina </button>            
                        </div>
                </form>

            </div>

            <div class="containerImage">
                <image src="./images/telaDePerfil-Imagem.png">
            </div>

        </div>
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