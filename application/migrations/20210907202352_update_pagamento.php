<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_update_pagamento extends CI_Migration {

    public function up() {
        $this->db->query("ALTER TABLE `pagamento` CHANGE `forma_pagamento` `forma_pagamento` ENUM('Dinheiro','Boleto','Transferência','Pix','Outros') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;");
    }


}