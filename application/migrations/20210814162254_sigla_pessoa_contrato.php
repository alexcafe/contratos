<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_sigla_pessoa_contrato extends CI_Migration {

    public function up() {
        $this->db->query("ALTER TABLE `pessoa` ADD `sigla` VARCHAR(15) NOT NULL AFTER `nome`;");
        $this->db->query("ALTER TABLE `contrato` ADD `codigo` VARCHAR(30) NOT NULL AFTER `escopo`;");
        
    }


}