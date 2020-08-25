<?php include('header.php') ?>

<div class="container">
    <div class="col">
    </div>
    <div class="col">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Código Produto</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Departamento</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php include('BD/pesquisa.php'); ?>
            </tbody>
        </table>
    </div>
    <div class="col">
    </div>
</div>



<?php include('footer.php') ?>