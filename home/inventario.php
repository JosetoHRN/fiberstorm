<?php
$zona="Inventario ";
$extraCss = "table.css";
include_once("../components/header.php");
?>
<main>
    <button class="primary" id="postInventario">Añadir inventario</button>
    <section id="tableOptions">
        <div class="searchBar">
            <input type="text" id="searchBar" placeholder="Búsqueda (tildes y signos de puntuación cuentan)"/>
            <img src="../assets/img/search.png" alt="icono lupa"/>
        </div>
        <div class="sortBy">
            <label for="sortBy">Ordenar:</label>
            <select name="sortBy" id="sortBy">
                <option value="importancia" selected>Importancia</option>
                <option value="modelo">Modelo</option>
                <option value="tipo">Tipo</option>
                <option value="ref">Referencia</option>
            </select>
        </div>
    </section>
    <div id="tableHeader"></div>
    <ul id="tableContent"></ul>

    <div id="POST_form">
        <h3>Añadir nuevo</h3>
        <form action="../php/inventario/post.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="modelo">Modelo: </label>
                <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>
            </div>
            <div>
                <label for="tipo">Tipo: </label>
                <input type="text" name="tipo" id="tipo" placeholder="Tipo" required>
            </div>
            <div>
                <label for="ref">Referencia: </label>
                <input type="text" name="ref" id="ref" placeholder="Ubicación en el almacén">
            </div>
            <div>
                <label for="imagen">Icono: </label>
                <input type="file" name="imagen" id="imagen" accept="image/png, image/jpg, image/jpeg">
            </div>
            <div>
                <label for="importancia">Importancia: </label>
                <select name="importancia" id="importancia" required>
                    <option value="Normal" selected>Normal</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="estado">Estado: </label>
                <input type="text" name="estado" id="estado" placeholder="En corte, En almacén, En costura, etc.">
            </div>
            <div>
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" id="cantidad" min="0" value="1" required>
            </div>
            <div class="botonera">
                <input type="submit" value="Aceptar">
                <button class="closeForm">Cancelar</button>
            </div>
        </form>
    </div>

    <script type="application/javascript" src="../assets/js/inventario.js"></script>
<?php
    include_once("../components/footer.php");
?>