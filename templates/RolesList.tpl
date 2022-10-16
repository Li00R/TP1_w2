{include file="Header.tpl"}

<!-- lista de Roles -->
<h2>{$title}</h2>
<ul class="list-group">
    {foreach from=$roles item=$rol}
        <li class="d-flex justify-content-between align-items-center">
            <a class="nav-link list-group-item list-group-item-action"  href="ChampsByRol/{$rol->ID_rol}"> {$rol->Rol_name}</a>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Roles</small></p>