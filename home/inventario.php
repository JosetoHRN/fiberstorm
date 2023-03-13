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
        <!-- <div class="sortBy">
            <label for="sortBy">Ordenar:</label>
            <select name="sortBy" id="sortBy">
                {keys.map((key) => <option value={key}>{key}</option>)}
            </select>
        </div> -->
    </section>
    <div id="tableHeader"></div>
    <ul id="tableContent"></ul>

    <div id="POST_form">
        <h3>Añadir nuevo</h3>
        <form action="../php/inventario/post.php" method="post">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" placeholder="Tipo">
            <label for="ref">Referencia</label>
            <input type="text" name="ref" id="ref" placeholder="Ubicación en el almacén">
            <label for="imagen">Icono</label>
            <input type="file" name="imagen" id="imagen" accept="image/png, image/jpg, image/jpeg">
            <label for="importancia">Importancia</label>
            <select name="importancia" id="importancia">
                <option value="Normal">Normal</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
            </select>
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" placeholder="En corte, En almacén, En costura, etc.">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" min="1" placeholder="1" required>
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