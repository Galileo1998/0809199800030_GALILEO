<section>
  <header>
    <h1>PLUGINS STORE</h1>
  </header>
  <main>
    <table class="full-width">
      <thead>
        <tr>
          <th>Cod</th>
          <th>Plugin</th>
          <th>Estado</th>
          <th>URL homepage</th>
          <th>URL cdn</th>
          <th class="right">
            <form action="index.php?page=examenform" method="post">
            <input type="hidden" name="efggm_idplugins" value="" />
            <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
            <button type="submit" name="btnIns">Agregar</button>
          </form>
          </th>
        </tr>
      </thead>
      <tbody class="zebra">
        {{foreach plugins}}
        <tr>
          <td>{{efggm_idplugins}}</td>
          <td>{{efggm_plugin}}</td>
          <td>{{efggm_estado}}</td>
          <td>{{efggm_urlhomepage}}</td>
          <td>{{efggm_urlcdn}}</td>
          <td class="right">
            <form action="index.php?page=examenform" method="post">
              <input type="hidden" name="efggm_idplugins" value="{{efggm_idplugins}}"/>
              <input type="hidden" name="xcfrt" value="{{~xcfrt}}" />
              <button type="submit" name="btnDsp">Ver</button>
              <button type="submit" name="btnUpd">Editar</button>
              <button type="submit" name="btnDel">Eliminar</button>
            </form>
          </td>
        </tr>
        {{endfor plugins}}
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6"> Paginación</td>
        </tr>
      </tfoot>
    </table>
  </main>
</section>
