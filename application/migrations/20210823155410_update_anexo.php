<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_update_anexo extends CI_Migration {

    public function up() {
        $this->db->query("ALTER TABLE `anexo` CHANGE `anexo` `anexo` VARCHAR(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;");
    }

}