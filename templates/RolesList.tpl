<!-- lista de Roles -->
<h2>Lista de Roles</h2>
<ul class="list-group">
    {foreach from=$roles item=$rol}
        <a class="list-group-item list-group-item-dark list-group-item list-group-item-action list-group-item-primary"  href="ChampsByRol/{$rol->ID_rol}"> {$rol->Rol_name}</a>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Roles</small></p>