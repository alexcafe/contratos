<!--
    index_view criada automaticamente, favor adaptar conforme necessario.
    Para saber mais: https://www.codeigniter.com/user_guide/general/views.html
-->
<h2>Index</h2>
<h4><a href="{tag} echo site_url('/{entity}/create/'); {untag}"> (+)</a></h4>

{tag} foreach ($lista_{entity} as $item): {untag}
<hr/>
        <h3>{tag} echo $item->CAMPO_1; {untag}</h3>
        <p><a href="{tag} echo site_url('/{entity}/details/'.$item->id); {untag}">Detalhes</a></p>

{tag} endforeach; {untag}