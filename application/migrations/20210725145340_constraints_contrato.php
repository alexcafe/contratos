<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_constraints_contrato extends CI_Migration {

    public function up() {
        $this->db->query("ALTER TABLE contrato ADD CONSTRAINT fk_tipo_contrato_id FOREIGN KEY ( tipo_contrato_id ) REFERENCES tipo_contrato ( id )");
        $this->db->query("ALTER TABLE contrato ADD CONSTRAINT fk_pessoa_contrato_id FOREIGN KEY ( pessoa_id ) REFERENCES pessoa ( id )");
        $this->db->query("ALTER TABLE anexo ADD CONSTRAINT fk_anexo_contrato_id FOREIGN KEY ( contrato_id ) REFERENCES contrato ( id )");
        $this->db->query("ALTER TABLE pagamento ADD CONSTRAINT fk_pagamento_contrato_id FOREIGN KEY ( contrato_id ) REFERENCES contrato ( id )");
    }

}
