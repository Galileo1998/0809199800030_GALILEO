<?php
  require_once "models/examendata.model.php";
  function run()
  {
      $estadoPlugins = obtenerEstados();
      $selectedEst = 'ACT';
      $mode = "";
      $errores=array();
      $hasError = false;
      $modeDesc = array(
        "DSP" => "PLUGIN ",
        "INS" => "Creando Nuevo Plugin",
        "UPD" => "Actualizando Plugin ",
        "DEL" => "Eliminando Plugin "
      );
      $viewData = array();
      $viewData["showIdPlugins"] = true;
      $viewData["showBtnConfirmar"] = true;
      $viewData["readonly"] = '';
      $viewData["selectDisable"] = '';

      if (isset($_POST["xcfrt"]) && isset($_SESSION["xcfrt"]) &&  $_SESSION["xcfrt"] !== $_POST["xcfrt"]) {
          redirectWithMessage(
              "Petición Solicitada no es Válida",
              "index.php?page=examenlist"
          );
          die();
      }
      $viewData["xcfrt"] = $_SESSION["xcfrt"];
      if (isset($_POST["btnDsp"])) {
          $mode = "DSP";
          $moda = obtenerPluginPorId($_POST["efggm_idplugins"]);
          $selectedEst=$moda["efggm_estado"];
          $viewData["showBtnConfirmar"] = false;
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnUpd"])) {
          $mode = "UPD";
          //Vamos A Cargar los datos
          $moda = obtenerPluginPorId($_POST["efggm_idplugins"]);
          $selectedEst=$moda["efggm_estado"];
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnDel"])) {
          $mode = "DEL";
          //Vamos A Cargar los datos
          $moda = obtenerPluginPorId($_POST["efggm_idplugins"]);
          $selectedEst=$moda["efggm_estado"];
          $viewData["readonly"] = 'readonly';
          $viewData["selectDisable"] = 'disabled';
          mergeFullArrayTo($moda, $viewData);
          $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
      }
      if (isset($_POST["btnIns"])) {
          $mode = "INS";
          //Vamos A Cargar los datos
          $viewData["modeDsc"] = $modeDesc[$mode];
           $viewData["showIdPlugins"]  = false;
      }
      // if ($mode == "") {
      //     print_r($_POST);
      //     die();
      // }
      if (isset($_POST["btnConfirmar"])) {
          $mode = $_POST["mode"];
          $selectedEst = $_POST["estplugin"];
           mergeFullArrayTo($_POST, $viewData);
          switch($mode)
          {
          case 'INS':
              $viewData["showIdPlugins"] = false;
              $viewData["modeDsc"] = $modeDesc[$mode];
              //validaciones
              if (!$hasError && agregarNuevoPlugin(
                  $viewData["dscplugin"],
                  $viewData["estplugin"],
                  $viewData["urlplugin"],
                  $viewData["cdnplugin"]
              )
              ) {
                  redirectWithMessage(
                      "Plugin Guardado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'UPD':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscjuguete"];
              if (modificarPlugin(
                  $viewData["dscplugin"],
                  $viewData["estplugin"],
                  $viewData["urlplugin"],
                  $viewData["cdnplugin"],
                  $viewData["efggm_idplugins"]
              )
              ) {
                  redirectWithMessage(
                      "Plugin Actualizado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          case 'DEL':
              $viewData["modeDsc"] = $modeDesc[$mode] . $viewData["dscplugin"];
              $viewData["readonly"] = 'readonly';
              $viewData["selectDisable"] = 'disabled';
              if (eliminarPlugin(
                  $viewData["efggm_idplugins"]
              )
              ) {
                  redirectWithMessage(
                      "Plugin Eliminado Exitosamente",
                      "index.php?page=examenlist"
                  );
                  die();
              }
              break;
          }
      }
      $viewData["mode"] = $mode;
      $viewData["estadoPlugins"] = addSelectedCmbArray($estadoPlugins, 'cod', $selectedEst);
      $viewData["hasErrors"] = $hasError;
      $viewData["errores"] = $errores;
      renderizar("examenform", $viewData);
  }
  run();
?>
