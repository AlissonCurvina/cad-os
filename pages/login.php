<?php
session_start();
include '../server/config.php';
include '../partials/head.php';

if( isset($_SESSION['id-user']) ) {
    header('location: ./main.php');    
    exit;
}

?>

<main class="login">
    
    <div class="container mt-5" >
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4 mt-5">
                    <h1 class="display-4 py-2 mt-5">Cad-OS</h1>
                    <div class="px-2">
                        <form action="./login_action.php" method="POST">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><span class="material-icons-outlined">mail</span></span>
                                <input type="email" class="form-control" aria-label="email" name="email" id="email" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><span class="material-icons-outlined">https</span></span>
                                <input type="password" class="form-control" aria-label="password" name="password" id="password" aria-describedby="basic-addon1">
                                
                            </div>
                            <small class="float-start" style="margin-top: -1rem;"><a href="#" class="">Esqueci a senha</a></small>
                            <div class="clearfix"></div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success my-3">Entrar</button>
                            </div>
                            
                            <span class="solicitar">Ainda não tem usuário?<a href="../admin.php" class="text-under">Solicitar</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php
include '../partials/footer.php';