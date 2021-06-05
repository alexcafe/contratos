<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_create_pessoa extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'nome' => array(
                'type' => 'VARCHAR',
                'constraint' => 400,
            ),
            'cpf_cnpj' => array(
                'type' => 'VARCHAR',
                'constraint' => 14,
            ),
            'tipo_pessoa' => array(
                'type' => 'CHAR',
                'constraint' => 1,
            ),
            'ie' => array( //inscrição estadual
                'type' => 'VARCHAR',
                'constraint' => 14,
                'null'  => TRUE 
            ),
            'logradouro' => array(
                'type' => 'VARCHAR',
                'constraint' => 400,
            ),
            'numero' => array(
                'type' => 'INT',
                'constraint' => 7,
            ),
            'complemento' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'  => TRUE 
            ),
            'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'cep' => array(
                'type' => 'INT',
                'constraint' => 8,
            ),
            'cidade' => array(
                'type' => 'VARCHAR',
                'constraint' => 200,
            ),
            'estado' => array(
                'type' => 'VARCHAR',
                'constraint' => 2,
            ),
            'telefone' => array(
                'type' => 'BIGINT',
                'constraint' => 10,
                'null'  => TRUE 
            ),
            'celular' => array(
                'type' => 'BIGINT',
                'constraint' => 11,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 200,
            ),
            'responsavel' => array(
                'type' => 'VARCHAR',
                'constraint' => 400,
                'null'  => TRUE 
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
        $this->dbforge->create_table('pessoa');
    }

    public function down() {
        $this->dbforge->drop_table('pessoa');
    }

}