<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_pagamento extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'valor' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ),
            'vencimento' => array(
                'type' => 'DATE',
                'null'  => TRUE,
            ),
            'status' => array(
   				       'type'       => 'ENUM("Emitido","Vencido","Pago")',
            ),
            'forma_pagamento' => array(
   				       'type'       => 'ENUM("À vista","Boleto","Transferência","Pix","Outros")',
                 'null'  => TRUE,
            ),
            'nota_fiscal' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'  => TRUE,
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
        $this->dbforge->create_table('pagamento');
    }

    public function down() {
        $this->dbforge->drop_table('pagamento');
    }

}
