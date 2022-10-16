
{include file="Header.tpl"}

<!-- lista de Champs -->
<h2>{$title}</h2> 
<a href='AgregarChamp' type='button' class='btn btn-danger'>Agregar</a>
<ul class="list-group">
    {foreach from=$champs item=$champ}
        <li class="d-flex justify-content-between align-items-center">
            <a class="nav-link list-group-item list-group-item-action" href="ChampDetail/{$champ->ID_champ}"> <b>{$champ->Champ_name}</b> </a>    
            {if isset($smarty.session.IS_LOGGED)}
                <a href='DeleteChamp/{$champ->ID_champ}' type='button' class='btn btn-danger'>Borrar</a>
                <a href='EditChamp/{$champ->ID_champ}' type='button' class='btn btn-danger'>Editar</a>
            {/if}
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Champs</small></p>

