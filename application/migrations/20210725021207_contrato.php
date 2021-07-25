<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_contrato extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'tipo_contrato_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'unsigned'       => TRUE,
            ),
            'escopo' => array(
                'type' => 'VARCHAR',
                'constraint' => 500,
            ),
            'formalizado' => array(
                'type' => 'CHAR',
                'constraint' => 1,
                'comment' => '(S)im ou (N)ão'
            ),
            'situacao' => array(
   				       'type'       => 'ENUM("Assinatura","Assinado","Vigente","Vencendo","Vencido","Informal")',
            ),
            'valor' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ),
            'forma_pagamento' => array(
                'type' => 'CHAR',
                'constraint' => 1,
                'comment' => '(U)nico ou (M)ensal'
            ),
            'inicio_contrato' => array(
                'type' => 'DATE',
                'null'  => TRUE,
            ),
            'fim_contrato' => array(
                'type' => 'DATE',
                'null'  => TRUE,
            ),
            'contrato_anterior_id' => array(
              'type' => 'INT',
              'constraint' => 11,
              'unsigned'       => TRUE,
              'null'  => TRUE,
            ),
            'observacao' => array(
                'type' => 'VARCHAR',
                'constraint' => 20000,
                'null'  => TRUE,
            ),
            'fiscal' => array(
                'type' => 'VARCHAR',
                'constraint' => 400,
                'null'  => TRUE,
            ),
            'pessoa_id' => array(
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
        $this->dbforge->create_table('contrato');
    }

    public function down() {
        $this->dbforge->drop_table('contrato');
    }

}
