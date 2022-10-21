{if isset($smarty.session.IS_LOGGED)}
    {if (isset($delete) && $delete == True)}
        <a href='Delete{$thing}/{$id}' type='button' class='btn btn-danger'>Borrar</a>
    {else}
        <a  type='button' class="btn btn-warning">Borrar</a>
    {/if}
    <a href='Edit{$thing}/{$id}' type='button' class='btn btn-danger'>Editar</a>
{/if}