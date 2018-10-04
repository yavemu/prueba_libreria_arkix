<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Guia Basica del proyecto</h1>

        <p class="alert alert-warning"> <b>Nota:</b> Para poder realizar cualquier acción debe estar previamente logueado. (Menu superior -> Login)</p>
    </div>
    <hr>
    <div class="body-content">

        <div class="row">
            <div class="col-md-3 panel panel-default">
                <h2>Módulo Cliente</h2>
                <p>En este módulo se puede crear, modificar y consultar clientes.</p>
                <hr><h3>Consultar clientes</h3>
                <p>Para consultar clientes, solo se requiere ingresar a la opción de Clientes del menu superior, se visualizara una grilla donde se listaran todos los clientes existentes. Se pueden ordenar dando clic en el nombre de la columna y filtrar ingresando algun valor en la celda de cada columna. Al lado derecho de cada fila se encuentran dos opciones <br> Ver <b class='glyphicon glyphicon-eye-open'></b> <br> Modificar <b class='glyphicon glyphicon-pencil'></b>  </p>
                <hr><h3>Crear cliente</h3>
                <p>Para crear clientes debe ingresar a la opción de Clientes del menu superior, luego dar clic en el botón <b class="subtitle">Registrar Cliente</b> e ingresar la información que se solicita en el formulario y dar clic en el botón <b>Guardar</b>. </p>
                <hr><h3>Modificar cliente</h3>
                <p>Para modificar un cliente debe ingresar a la opción de Clientes del menu superior, en la grilla seleccionar el cliente que se desea modificar (icono de lapiz <b class='glyphicon glyphicon-pencil'></b> ), luego modificar la información que se desea en el formulario y dar clic en el botón <b>Guardar</b> </p>
                <hr><h3>Historico libros comprados por el cliente</h3>
                <p >Al consultar un cliente <b class='glyphicon glyphicon-eye-open'></b> se puede visualizar el Historico de los libros comprados por el cliente consultado. </p>
                <br><p class='alert alert-success'><b>Nota:</b> En esta opción encontrará enlaces directos para <b>ver el libro</b> o para <b>ver la compra.</b></p>
            </div>
            <div class="col-md-3 panel panel-default">
                <h2>Módulo Autor</h2>
                <p>En este módulo se puede crear, modificar y consultar autores.</p>
                <hr><h3>Consultar autores</h3>
                <p>Para consultar autores, solo se requiere ingresar a la opción de Autores del menu superior, se visualizara una grilla donde se listaran todos los autores existentes. Se pueden ordenar dando clic en el nombre de la columna y filtrar ingresando algun valor en la celda de cada columna. Al lado derecho de cada fila se encuentran dos opciones <br> Ver <b class='glyphicon glyphicon-eye-open'></b> <br> Modificar <b class='glyphicon glyphicon-pencil'></b>  </p>
                <hr><h3>Crear autor</h3>
                <p>Para crear autores debe ingresar a la opción de Autores del menu superior, luego dar clic en el botón <b class="subtitle">Registrar autor</b> e ingresar la información que se solicita en el formulario y dar clic en el botón <b>Guardar</b>. </p>
                <hr><h3>Modificar autor</h3>
                <p>Para modificar un autor debe ingresar a la opción de Autores del menu superior, en la grilla seleccionar el autor que se desea modificar (icono de lapiz <b class='glyphicon glyphicon-pencil'></b> ), luego modificar la información que se desea en el formulario y dar clic en el botón <b>Guardar</b> </p>
                <hr><h3>Historico libros del autor</h3>
                <p >Al consultar un autor <b class='glyphicon glyphicon-eye-open'></b> se puede visualizar el Historico de los libros del autor consultado. </p>
                <br><p class='alert alert-success'><b>Nota:</b> En esta opción encontrará un enlace directo para <b>ver el libro.</b></p>
            </div>
            <div class="col-md-3 panel panel-default">
                <h2>Módulo Libro</h2>
                <p>En este módulo se puede crear, modificar, vender y consultar libros.</p>
                <p class='alert alert-info'><b>Nota:</b> Todos los libros que se visualicen en este módulo se deben encontrar con Estado: Inventario. </p>
                <hr><h3>Consultar libros</h3>
                <p>Para consultar libros, solo se requiere ingresar a la opción de Libros del menu superior, se visualizara una grilla donde se listaran todos los libros existentes que aun no se han vendido. Se pueden ordenar dando clic en el nombre de la columna y filtrar ingresando algun valor en la celda de cada columna. Al lado derecho de cada fila se encuentran dos opciones <br> Ver <b class='glyphicon glyphicon-eye-open'></b> <br> Modificar <b class='glyphicon glyphicon-pencil'></b>  </p>
                <hr><h3>Crear libro</h3>
                <p>Para crear libros debe ingresar a la opción de Libros del menu superior, luego dar clic en el botón <b class="subtitle">Registrar libro</b> e ingresar la información que se solicita en el formulario y dar clic en el botón <b>Guardar</b>. </p>
                <hr><h3>Modificar libro</h3>
                <p>Para modificar un libro debe ingresar a la opción de Libros del menu superior, en la grilla seleccionar el libro que se desea modificar (icono de lapiz <b class='glyphicon glyphicon-pencil'></b> ), luego modificar la información que se desea en el formulario y dar clic en el botón <b>Guardar</b> </p>
                <hr><h3>Vender libro</h3>
                <p>Para vender un libro debe ingresar a la opción de Libros del menu superior, en la grilla seleccionar el libro que se desea vender (icono de ojo <b class='glyphicon glyphicon-eye-open'></b> ), luego dar clic en el boton <b>Vender</b> (en la parte inferior), ingresar la información que se solicita en el formulario y dar clic en el botón <b>Guardar</b> </p>
            </div>
            <div class="col-md-3 panel panel-default">
                <h2>Módulo Ventas</h2>
                <p>En este módulo se puede consultar ventas.</p>
                <p class='alert alert-info'><b>Nota:</b> Todos los libros que se visualicen en este módulo se deben encontrar con Estado: Vendido. </p>
                <hr><h3>Consultar ventas</h3>
                <p>Para consultar ventas, solo se requiere ingresar a la opción de Ventas del menu superior, se visualizara una grilla donde se listaran todos los libros vendidos. Se pueden ordenar dando clic en el nombre de la columna y filtrar ingresando algun valor en la celda de cada columna. Al lado derecho de cada fila se encuentra la opción <br> Ver <b class='glyphicon glyphicon-eye-open'></b>  </p>
                <hr><h3>Historico ventas por cliente</h3>
                <p >Al consultar un libro vendido <b class='glyphicon glyphicon-eye-open'></b> se puede visualizar el Historico de los libros comprados por el cliente asociado a dicha venta. </p>
                <br><p class='alert alert-success'><b>Nota:</b> En esta opción encontrará enlaces directos para <b>ver el libro</b> o para <b>ver la compra.</b></p>
            </div>
        </div>
    </div>
</div>
