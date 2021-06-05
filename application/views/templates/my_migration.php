{tag}
/*
ATENCAO: a tag php deve ser removida antes de gerar pela CLI.
Migration gerada automaticamente, deve ser editada para correto funcionamento.
Para saber mais sobre dbforge e migrations, ver:
----> DBForge: https://www.codeigniter.com/user_guide/database/forge.html
----> Migrations: https://www.codeigniter.com/user_guide/libraries/migration.html
*/
class Migration_{name} extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'CAMPO_1' => array(
                'type' => 'VARCHAR',
                'constraint' => 100,
            ),
            'CAMPO_2' => array(
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
        $this->dbforge->create_table('{entity}');
    }

    public function down() {
        $this->dbforge->drop_table('{entity}');
    }

}