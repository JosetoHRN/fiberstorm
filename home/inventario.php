<?php
$zona="Inventario ";
$extraCss = "table.css";
include_once("../components/header.php");
?>
<main>
    <button class="primary" id="postInventario">Añadir inventario</button>
    <section id="tableOptions">
        <div class="searchBar">
            <input type="text" id="searchBar" placeholder="Búsqueda (cuidado con tildes y otros signos)"/>
            <img src="../assets/img/search.png" alt="icono lupa"/>
        </div>
        <div class="sortBy">
            <label for="sortBy">Ordenar:</label>
            <select name="sortBy" id="sortBy">
                <option value="" disabled selected>Elija un orden</option>
                <option value="0">Modelo</option>
                <option value="1">Tipo</option>
                <option value="2">Referencia</option>
                <option value="4">Importancia</option>
                <option value="5">Estado</option>
            </select>
        </div>
    </section>
    <div id="tableHeader"></div>
    <ul id="tableContent"></ul>

    <div class="popup" id="imageViewer">
        <svg xmlns="http://www.w3.org/2000/svg" class="close_popup" height="24" width="24" fill="var(--light)"><path d="M6.4 19 5 17.6l5.6-5.6L5 6.4 6.4 5l5.6 5.6L17.6 5 19 6.4 13.4 12l5.6 5.6-1.4 1.4-5.6-5.6Z"/></svg>
        <img src="" alt="" />
    </div>

    <div id="POST_form">
        <h3>Añadir nuevo: </h3>
        <form action="../php/inventario/post.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="modelo">Modelo: </label>
                <input type="text" name="modelo" id="modeloPOST" placeholder="Modelo" required>
            </div>
            <div>
                <label for="tipo">Tipo: </label>
                <input type="text" name="tipo" id="tipoPOST" placeholder="Tipo" required>
            </div>
            <div>
                <label for="ref">Referencia: </label>
                <input type="text" name="ref" id="refPOST" placeholder="Ubicación en el almacén">
            </div>
            <div>
                <label for="imagen">Imagen: </label>
                <input type="file" name="imagen" id="imagenPOST" accept="image/png, image/jpg, image/jpeg">
            </div>
            <div>
                <label for="importancia">Importancia: </label>
                <select name="importancia" id="importanciaPOST" required>
                    <option value="Normal" selected>Normal</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="estado">Estado: </label>
                <input type="text" name="estado" id="estadoPOST" placeholder="En corte, En almacén, En costura, etc.">
            </div>
            <div>
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" id="cantidadPOST" min="0" value="1" required>
            </div>
            <div class="botonera">
                <a class="closeForm secondary-light">Cancelar</a>
                <input type="submit" value="Aceptar">
            </div>
        </form>
    </div>

    <div id="PUT_form">
        <h3>Modificando...</h3>
        <form action="../php/inventario/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="idPUT" />
            <div>
                <label for="modelo">Modelo: </label>
                <input type="text" name="modelo" id="modeloPUT" required>
            </div>
            <div>
                <label for="tipo">Tipo: </label>
                <input type="text" name="tipo" id="tipoPUT" required>
            </div>
            <div>
                <label for="ref">Referencia: </label>
                <input type="text" name="ref" id="refPUT">
            </div>
            <div>
                <label for="imagen">Imagen: </label>
                <img src="" alt="" style="width: 64px; height: 64px;">
                <input type="file" name="imagen" id="imagenPUT" accept="image/png, image/jpg, image/jpeg">
            </div>
            <div>
                <label for="importancia">Importancia: </label>
                <select name="importancia" id="importanciaPUT" required>
                    <option value="Normal">Normal</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label for="estado">Estado: </label>
                <input type="text" name="estado" id="estadoPUT">
            </div>
            <div>
                <label for="cantidad">Cantidad: </label>
                <input type="number" name="cantidad" id="cantidadPUT" min="0" required>
            </div>
            <div class="botonera">
                <a class="closeForm secondary-light">Cancelar</a>
                <input type="submit" value="Aceptar">
            </div>
        </form>
    </div>

    <script type="application/javascript" src="../assets/js/inventario.js"></script>
<?php
    include_once("../components/footer.php");
?>