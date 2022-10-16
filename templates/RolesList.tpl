<!-- lista de Roles -->
{if isset($smarty.session.IS_LOGGED)}    
    {if $title == "Roles"}
        <a href='AddRol' type='button' class='btn btn-danger'>Agregar</a>
    {/if}
{/if}
<ul class="list-group">
    {foreach from=$roles item=$rol}
        <li class="d-flex justify-content-between align-items-center">
            <a class="nav-link list-group-item list-group-item-action"  href="Roles/{$rol->ID_rol}"> {$rol->Rol_name}</a>      
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Roles</small></p>