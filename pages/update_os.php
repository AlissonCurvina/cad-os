<?php
session_start();
include '../partials/head.php';
include '../partials/header.php';
include '../models/Order.php';

if( !$_SESSION['id-user'] ) {
    header('location: ./login.php');    
    exit;
}

$os = $_GET['id'];
$order = new Order();
$res = $order->listById( $os );
$updates = $order->listUpdates( $os );
if( $updates == "undefined" ) {
    $updates = [];
}

if ($res['status'] == "Aberta") {
    $status = "bg-success";
} else {
    $status = "bg-danger";
}

?>
<div class="container">
    <h1 class="text-center my-3">Atualização da OS <?=$os?></h1>
    <div class="card text-dark bg-light mb-3" style="width: 100%;">
        <div class="card-header"><span class="badge <?=$status?>"><?=$res['status']?></span><span class="mx-3">Histórico da Os</span></div>
        <div class="card-body" id="card-body">
            <h6 class="card-title"><?=$res['creation_time'];?> - Abertura da OS</h6>
            <p class="card-text"><?=$res['creation_user'];?> - <?=$res['description'];?></p>
            <hr>
            <?php 
                if( !empty($updates) ) {
                    foreach( $updates as $update ) {
                        echo "<h6 class='card-title'>".$update['update_time']."- Atualização da 
                        OS</h6>
                        <p class='card-text'>".$update['update_user']." - ".$update['update_content']."</p>
                        <hr>";
                    }
                }
            ?>
        </div>
    </div>    
    <form action="./update_os_action.php" method="POST" class="my-5">
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="Aberta">Aberta</option>
                <option value="Fechada">Fechada</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="update-content" class="form-control"rows="3"></textarea>
        </div>
        <input type="hidden" name="current-status" value="<?=$res['status'];?>">
        <input type="hidden" name="id-os" value="<?=$res['id'];?>">
    
    <button type="submit" class="btn btn-success">Salvar</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
    
    </form>
</div>