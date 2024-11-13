<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_PLAYERA.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: PLAYERA,  orderBy: PLA_NOM);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[PLA_ID]);
  $id = htmlentities($encodeId);
  $nombre = htmlentities($modelo[PLA_NOM]);
  $talla = htmlentities($modelo[PLA_TALLA]);
  $tela = htmlentities($modelo[PLA_TELA]);
  $color = htmlentities($modelo[PLA_COLOR]);
  $render .=
   " <a href='modifica.html?id=$id'><li class='md-two-line'>
   <img alt='Coyote de Neza' src='img/icono2048.png'>
            <span class='headline'>{$nombre} </span>
            <span class='supporting'>{$talla}</span>
             <span class='supporting'>{$tela}</span>
              <span class='supporting'>{$color}</span>
         </li>
         </a>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});

// <p>
//       <a href='modifica.html?id=$id'>$nombre</a>
//      </p>