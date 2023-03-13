<?php
$zona="Inventario ";
include_once("../components/header.php");
?>
<main>
    <button class="primary" id="postInventario">Añadir inventario</button>
    <section id="tableOptions">
        <div class="searchBar">
            <input type="text" id="searchBar" placeholder="Búsqueda" onchange=""/>
            <img src="../assets/img/search.png" alt="icono lupa"/>
        </div>
        <!-- <div class="sortBy">
            <label for="sortBy">Ordenar:</label>
            <select name="sortBy" id="sortBy" onchange="">
                {keys.map((key) => <option value={key}>{key}</option>)}
            </select>
        </div> -->
    </section>
    <div id="tableHeader">
        <div>
            <!-- {keys.map((value) => (<span key={value}>{value}</span>))} -->
        </div>
    </div>
    <ul id="tableContent">
        <!-- {data.length >= 1 ? (data.map((item)=>(
            <li key={item.id}>
                <Item itemData={item} />
            </li>
        ))) : <li>Ninguna coincidencia</li>} -->
    </ul>


    <script type="application/javascript" src="../assets/js/inventario.js"></script>
<?php
    include_once("../components/footer.php");
?>