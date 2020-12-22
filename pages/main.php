<?php
session_start();

if( !$_SESSION['id-user'] ) {
    header('location: ./login.php');    
    exit;
}

include '../partials/head.php';
include '../partials/header.php';
include '../models/Order.php';

$list = new Order();
$data = $list->list();

?>

<main>
    <div class="container">
        <h1 class="text-center">OS's abertas</h1>

        <table class="table table-striped table-hover" >
            <thead class="">
                <tr>
                    <th>Status</th>
                    <th>Nº</th>
                    <th>Data da última atualização</th>
                    <th>Usuário da última atualização</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $data as $order ): ?>
                <tr>
                    <td class="align-middle">
                    <?php
                    if ($order['status'] == "Aberta") {
                        $status = "bg-success";
                    } else {
                        $status = "bg-danger";
                    }
                    ?>
                        <div class="text-white text-center <?=$status;?>">
                            <?= $order['status'];?>
                        </div>
                    </td>
                    <td class="align-middle"><?= $order['id'];?></td>
                    <td class="align-middle"><?= $order['update_time'];?></td>
                    <td class="align-middle"><?= $order['update_user'];?></td>
                    <td class="d-flex">
                        <button class="btn btn-outline-success mx-2" data-id="<?=$order['id'];?>" id="<?=$order['id'];?>" data-bs-toggle="modal" data-bs-target="#modalOs" data-bs-whatever="<?=$order['id'];?>">Ver OS</button>
                        <form action="delete_os.php" method="POST">
                            <input type="hidden" name="id" value="<?=$order['id'];?>">
                            <button type="submit" class="btn btn-danger" href="#" onclick="return confirm('Deseja mesmo excluir a OS?')">Excluir</a>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Criar OS</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de atendimento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <form action="criar_action.php" method="POST">
                    <div class="form-group">
                        <label for="type">Selecione o tipo da OS</label>
                        <select name="type" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="Reparo">Reparo</option>
                            <option value="Instalação">Instalação</option>
                            <option value="Visita">Visita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="Aberta">Aberta</option>
                            <option value="Fechada">Fechada</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" class="form-control"rows="3"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalOs" tabindex="-1" aria-labelledby="modalOsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mx-2" id="modalOsLabel">OS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-dark bg-light mb-3" style="width: 100%;">
                    <div class="card-header"></div>
                    <div class="card-body" id="card-body">
                        <!-- Aqui serão adicionados os cards com os updates -->
                    </div>
                    </div>
            </div>
            <div class="modal-footer" id="modal-footer">
                <a id="updateOsButton" class="btn btn-primary">Atualizar OS</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar janela</button>
            </div>
            </div>
        </div>
        </div>

    </div>   
</main>

<?php
include '../partials/footer.php';