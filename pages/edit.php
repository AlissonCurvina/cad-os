<main>
    <div class="container">
        <form class="edit" action="#" method="POST">
            <h1>OS 457</h1>

            <h3>Os criada por Jeremias em:</h3>
            <span>07/12/2020 - 14:25</span>
            <h3>Última atualização feita por Laura em:</h3>
            <span>07/12/2020 - 16:00</span>

            <h3>Descrição e observações da OS</h3>
            <p>07/12/2020 - 14:25 - Operador informou que a máquina está apresentando barulho excessivo ao ser ligada.</p>
            <p>07/12/2020 - 14:40 - Enviado socorrista Mateus com a viatura 456.</p>
            <p>07/12/2020 - 16:00 - Veículo liberado para operação após reparo.</p>
            
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="type">Status da OS<br/></label>
                <select name="type" id="type">
                    <option value="repair">Aberta</option>
                    <option value="installation">Fechada</option>
                    <option value="visit">Em execução</option>
                </select>
            </div>

            <button type="submit" class="btn">Atualizar OS</button>
        </form>
    </div>
</main>