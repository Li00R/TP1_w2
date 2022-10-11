
{include file="Header.tpl"}

<!-- lista de Champs -->
<h2>Lista de Champs</h2>
<ul class="list-group">
    {foreach from=$champs item=$champ}
        <a class="list-group-item list-group-item-dark list-group-item list-group-item-action list-group-item-primary"  href="ChampDetail/{$champ->Champ_name}"> {$champ->Champ_name}</a>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} Champs</small></p>

