<h1>{{modeDsc}}</h1>
<section class="row">
<form action="index.php?page=examenform" method="post" class="col-8 col-offset-2">
  {{if hasErrors}}
    <section class="row">
      <ul class="error">
        {{foreach errores}}
          <li>{{this}}</li>
        {{endfor errores}}
      </ul>
    </section>
  {{endif hasErrors}}
  <input type="hidden" name="mode" value="{{mode}}"/>
  <input type="hidden" name="xcfrt" value="{{xcfrt}}" />
  <input type="hidden" name="btnConfirmar" value="Confirmar" />
  {{if showIdPlugins}}
  <fieldset class="row">
    <label class="col-5" for="efggm_idplugins">Código de Plugin</label>
    <input type="text" name="efggm_idplugins" id="efggm_idplugins" readonly value="{{efggm_idplugins}}" class="col-7" />
  </fieldset>
  {{endif showIdPlugins}}
  <fieldset class="row">
    <label class="col-5" for="dscplugin">Nombre Plugin: </label>
    <input type="text" name="dscplugin" id="dscplugin" {{readonly}} value="{{efggm_plugin}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="estplugin">Estado: </label>
    <select name="estplugin" id="estplugin" class="col-7" {{selectDisable}} {{readonly}} >
      {{foreach estadoPlugins}}
        <option value="{{cod}}" {{selected}}>{{dsc}}</option>
      {{endfor estadoPlugins}}
    </select>
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="urlplugin">URL Homepage: </label>
    <input type="text" name="urlplugin" id="urlplugin" {{readonly}} value="{{efggm_urlhomepage}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <label class="col-5" for="cdnplugin">URL CDN: </label>
    <input type="text" name="cdnplugin" id="cdnplugin" {{readonly}} value="{{efggm_urlcdn}}" class="col-7" />
  </fieldset>
  <fieldset class="row">
    <div class="right">
      {{if showBtnConfirmar}}
      <button type="button" id="btnConfirmar" >Confirmar</button>
      &nbsp;
      {{endif showBtnConfirmar}}
      <button type="button" id="btnCancelar">Cancelar</button>
    </div>
  </fieldset>
  <!--
   <td>{{idmoda}}</td>
    <td>{{dscmoda}}</td>
    <td>{{prcmoda}}</td>
    <td>{{ivamoda}}</td>
    <td>{{estmoda}}</td>
   -->
</form>
</section>
<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=examenlist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
