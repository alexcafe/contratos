<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_anexo_contrato extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'anexo' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'contrato_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'unsigned'       => TRUE,
            ),
            'dt_delete' => array(
				        'type'  => 'TIMESTAMP',
                'null'  => TRUE
            ),
            'deleted' => array(
                'type' => 'BOOLEAN',
                'default' => FALSE,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('anexo');
    }

    public function down() {
        $this->dbforge->drop_table('anexo');
    }

}
