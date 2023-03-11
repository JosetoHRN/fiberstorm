<?php
include_once('../components/header.php');
?>
    <main>
        <div class="home_container">
            <h3>Seleccione su área de trabajo</h3>
            <div class="area_container">
                <a href="./inventario.php">
                    <div class="avatar">
                        <img src="../assets/img/inventario.png" alt="inventario"/>
                    </div>
                    <p>Inventario</p>
                </a>
                <a href="./corte.php">
                    <div class="avatar">
                        <img src="../assets/img/corte.png" alt="corte"/>
                    </div>
                    <p>Corte</p>
                </a>
                <a href="./costura.php">
                    <div class="avatar">
                        <img src="../assets/img/costura.png" alt="costura"/>
                    </div>
                    <p>Costura</p>
                </a>
            </div>
        </div>

<?php
    include_once('../components/footer.php');
?>