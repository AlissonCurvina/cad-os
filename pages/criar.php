<?php
include '../partials/head.php';
include '../partials/header.php';

?>

<main>
    <div class="container">
        <form action="criar_action.php" method="POST">
            <h1>Cadastro de atendimento</h1>
            <div class="form-group">
                <label for="type">Selecione o tipo da OS</label>
                <select name="type" id="type">
                    <option value="Reparo">Reparo</option>
                    <option value="Instalação">Instalação</option>
                    <option value="Orçamento">Orçamento</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status da OS<br/><small>Use "aberta" sempre que uma OS ainda não tiver sido tratada</small></label>
                
                <select name="status" id="status">
                    <option value="Aberta">Aberta</option>
                    <option value="Fechada">Fechada</option>
                    <option value="Em execução">Em execução</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <button class="btn">Salvar atendimento</button>
        </form>
    </div>
</main>

<?php
include '../partials/footer.php';