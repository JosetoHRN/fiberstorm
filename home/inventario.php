<?php
$zona="Inventario ";
$extraCss = "table.css";
include_once("../components/header.php");
?>
<main>
    <button class="primary" id="postInventario">Añadir inventario</button>
    <section id="tableOptions">
        <div class="searchBar">
            <input type="text" id="searchBar" placeholder="Búsqueda"/>
            <img src="../assets/img/search.png" alt="icono lupa"/>
        </div>
        <!-- <div class="sortBy">
            <label for="sortBy">Ordenar:</label>
            <select name="sortBy" id="sortBy" onchange="">
                {keys.map((key) => <option value={key}>{key}</option>)}
            </select>
        </div> -->
    </section>
    <div id="tableHeader"></div>
    <ul id="tableContent"></ul>

    <script type="application/javascript" src="../assets/js/inventario.js"></script>
<?php
    include_once("../components/footer.php");
?>