<?php
require_once "libs/dao.php";

// Elaborar el algoritmo de los solicitado aquí.

/*
SELECT `plugins`.`efggm_idplugins`,
    `plugins`.`efggm_plugin`,
    `plugins`.`efggm_estado`,
    `plugins`.`efggm_urlhomepage`,
    `plugins`.`efggm_urlcdn`
FROM `examen`.`plugins`;
*/
function obtenerListas()
{
    $sqlstr = "select `plugins`.`efggm_idplugins`,
        `plugins`.`efggm_plugin`,
        `plugins`.`efggm_estado`,
        `plugins`.`efggm_urlhomepage`,
        `plugins`.`efggm_urlcdn`
         from `examen`.`plugins`";

    $modas = array();
    $modas = obtenerRegistros($sqlstr);
    return $modas;
}

function obtenerPluginPorId($id)
{
  $sqlstr="select `plugins`.`efggm_idplugins`,
      `plugins`.`efggm_plugin`,
      `plugins`.`efggm_estado`,
      `plugins`.`efggm_urlhomepage`,
      `plugins`.`efggm_urlcdn`
       from `examen`.`plugins` where efggm_idplugins=%d";
  $juguetes= array();
  $juguetes=obtenerUnRegistro(sprintf($sqlstr, $id));
  return $juguetes;
}



function obtenerEstados()
{
    return array(
        array("cod"=>"ACT", "dsc"=>"Activo"),
        array("cod"=>"INA", "dsc"=>"Inactivo"),
        array("cod"=>"PLN", "dsc"=>"En Planificación"),
        array("cod"=>"RET", "dsc"=>"Retirado"),
        array("cod"=>"SUS", "dsc"=>"Suspendido"),
        array("cod"=>"DES", "dsc"=>"Descontinuado")
    );
}

function agregarNuevoPlugin($dscplugin, $estplugin, $urlplugin, $cdnplugin) {
    $insSql = "INSERT INTO plugins(efggm_plugin, efggm_estado, efggm_urlhomepage, efggm_urlcdn)
      values ('%s', '%s', '%s', '%s');";
      if (ejecutarNonQuery(
          sprintf(
              $insSql,
              $dscplugin,
              $estplugin,
              $urlplugin,
              $cdnplugin
          )))
      {
        return getLastInserId();
      } else {
          return false;
      }
}

function modificarPlugin($dscplugin, $estplugin, $urlplugin, $cdnplugin, $idplugin)
{
    $updSQL = "UPDATE plugins set efggm_plugin='%s', efggm_estado='%s',
    efggm_urlhomepage='%s', efggm_urlcdn='%s' where efggm_idplugins=%d;";

    return ejecutarNonQuery(
        sprintf(
            $updSQL,
            $dscplugin,
            $estplugin,
            $urlplugin,
            $cdnplugin,
            $idplugin
        )
    );
}
function eliminarPlugin($idplugin)
{
    $delSQL = "DELETE FROM plugins where efggm_idplugins=%d;";

    return ejecutarNonQuery(
        sprintf(
            $delSQL,
            $idplugin
        )
    );
}
?>
