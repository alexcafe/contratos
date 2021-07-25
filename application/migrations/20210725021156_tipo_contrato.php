<?php
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_tipo_contrato extends CI_Migration {

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
                'constraint' => 100,
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
        $this->dbforge->create_table('tipo_contrato');

        $this->db->query ("INSERT INTO `tipo_contrato` (`nome`, `dt_delete`, `deleted`) VALUES
        ('Projeto', NULL, 0),
        ('Serviço', NULL, 0),
        ('Cooperação', NULL, 0),
        ('1ª Renovação', NULL, 0),
        ('2ª Renovação', NULL, 0),
        ('3ª Renovação', NULL, 0),
        ('4ª Renovação', NULL, 0),
        ('5ª Renovação', NULL, 0)");
    }

    public function down() {
        $this->dbforge->drop_table('tipo_contrato');
    }

}
