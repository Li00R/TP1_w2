<!-- lista de Champs -->
{if isset($smarty.session.IS_LOGGED)}    
    {if $title == "Champs"}
        <a href='Admin/AddChamp' type='button' class='btn btn-danger'>Agregar</a>
    {/if}
{/if}
<ul class="list-group">
    {foreach from=$champs item=$champ}
        <li class="d-flex justify-content-between align-items-center">
            <a class="nav-link list-group-item list-group-item-action" href="Champs/{$champ->ID_champ}"> <b>{$champ->Champ_name}</b> </a>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Champs</small></p>

