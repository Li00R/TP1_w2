<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="Admin/{$action}{$nav_id}/SEND">
        <div class="form-group">
            <label for="Name">Champ Name</label>
            <input type="String" required class="form-control" id="Name" name="Name">
        </div>
        <div class="form-group">
            <label for="ID_rol">Rol</label>
            <select name="ID_rol" class="form-select">
                    {foreach from=$roles item=$rol}
                        <option value="{$rol->ID_rol}">{$rol->Rol_name}</option>
                    {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="Line">Line</label>
            <input type="String" required class="form-control" id="Line" name="Line">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Hecho</button>
    </form>
</div>