<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'              => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug'              => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],
            'sku'               => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'price'             => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'sale_price'        => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => true,
            ],
            'short_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'description'       => [
                'type' => 'LONGTEXT',
                'null' => true,
            ],
            'stock_quantity'    => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'highlights'        => [
                'type' => 'TEXT',
                'null' => true, // có thể lưu JSON hoặc text bullet points
            ],
            'meta_title'        => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'meta_description'  => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'thumbnail'         => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'gallery'           => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'category_id'       => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'brand_id'          => [  // sửa lại từ "brand" -> "brand_id"
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'size'              => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'thickness'         => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'status'            => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'created_at'        => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'        => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('brand_id', 'brands', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
