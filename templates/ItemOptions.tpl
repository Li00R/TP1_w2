{if isset($smarty.session.IS_LOGGED)}
    <a href='Delete{$thing}/{$id}' type='button' class='btn btn-danger'>Borrar</a>
    <a href='Edit{$thing}/{$id}' type='button' class='btn btn-danger'>Editar</a>
{/if}