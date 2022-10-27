<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="{$action}{$nav_id}/SEND">
        <div class="form-group">
            <label for="Name">Champ Name</label>
            <input type="String" required class="form-control" {if $action == "EditChamp"}value={$champ->Champ_name} {/if} name="Name">
        </div>
        <div class="form-group">
            <label for="ID_rol">Rol</label>
            <select name="ID_rol" class="form-select">
                    {foreach from=$roles item=$rol}
                    <option value="{$rol->ID_rol}" {if $rol->ID_rol == $champ->ID_rol}selected{/if}>{$rol->Rol_name}</option>
                    {/foreach}
            </select>
        </div>
        <div class="form-group">
            <label for="Line">Line</label>
            <input type="String" required class="form-control" {if $action == "EditChamp"}value={$champ->Line_name} {/if} name="Line">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Hecho</button>
    </form>
</div>