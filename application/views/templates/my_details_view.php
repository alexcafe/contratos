<!-- 
details_view criada automaticamente, favor adaptar conforme necessario. 
Para saber mais: https://www.codeigniter.com/user_guide/general/views.html
-->
{tag} if($message !== FALSE): {untag}
<div "alert alert-primary" role="alert">{tag} echo $message; {untag}</div>
{tag} endif;{untag}
<h2>Detalhes</h2>
<div class="form-group">
    <label for="CAMPO_1" class="bmd-label-floating">Campo 1</label>
    <div name="CAMPO_1"> {tag} echo ${entity}->CAMPO_1; {untag} </div>
</div>
<div class="form-group">
    <label for="CAMPO_2" class="bmd-label-floating">Campo 2</label>
    <div name="CAMPO_2"> {tag} echo ${entity}->CAMPO_2; {untag} </div>
</div>
