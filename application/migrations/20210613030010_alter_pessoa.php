<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_alter_pessoa extends CI_Migration {

    public function up() {
        $this->db->query("ALTER TABLE `pessoa` CHANGE `ie` `ie` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;");
        $this->db->query("ALTER TABLE `pessoa` ADD UNIQUE(`cpf_cnpj`);");
    }


}