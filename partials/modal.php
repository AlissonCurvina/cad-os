
<div class="container">
    <div>
        <div>
            <h2>Histórico da OS <?= $data['id'];?></h2>
            <span><?= $data['creation_time'];?> - Criação da OS</span>
            <div><?= $data['creation_user'];?> - <?= $data['description'];?></div>
            <?php foreach( $updates as $item ) :?>
            <span><?= $item['update_time'];?> - Atualização da OS</span>
            <div><?= $item['update_user'];?> - <?= $item['update_content'];?></div>
            <?php endforeach; ?>
        <div>
            <a href="update_os.php?id=<?=$data['id'];?>" class="btn">Atualizar</a>
            <a href="#" class="btn">Fechar</a>
            <a href="delete_os.php?id=<?=$data['id'];?>" class="btn" onclick="return confirm('Deseja mesmo excluir a OS?')">Excluir OS</a>
        </div>

    </div>
</div>