<!-- 
create_view criada automaticamente, favor adaptar conforme necessario. 
Para saber mais: https://www.codeigniter.com/user_guide/general/views.html
-->
<h2>Criar</h2>

{tag} echo validation_errors(); {untag}

{tag} echo form_open('{entity}/create'); {untag}
<div class="form-group">
    <label for="CAMPO_1" class="bmd-label-floating">Campo 1</label>
    <input type="input" class="form-control" name="CAMPO_1" value="{tag} echo set_value('CAMPO_1'); {untag}"/><br />
</div>
<div class="form-group">
    <label for="CAMPO_2" class="bmd-label-floating">Campo 2</label>
    <input type="input" class="form-control" name="CAMPO_2" value="{tag} echo set_value('CAMPO_2'); {untag}"/><br />
</div>

<button type="submit" class="btn btn-primary btn-raised">Criar {entity}</button>
