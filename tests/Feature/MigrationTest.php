<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that all required tables are created by migrations.
     */
    public function test_all_tables_are_created(): void
    {
        $requiredTables = [
            'users',
            'jemaats',
            'pelayanans',
            'komsels',
            'pelayans',
            'jadwal_ibadahs',
            'persembahans',
            'komsel_members',
            'jadwal_pelayans',
            'komsel_meetings',
            'church_settings',
        ];

        foreach ($requiredTables as $table) {
            $this->assertTrue(
                Schema::hasTable($table),
                "Table {$table} does not exist"
            );
        }
    }

    /**
     * Test that pelayanans table has correct structure.
     */
    public function test_pelayanans_table_structure(): void
    {
        $this->assertTrue(Schema::hasTable('pelayanans'));
        
        $columns = [
            'id',
            'nama_pelayanan',
            'deskripsi',
            'koordinator_id',
            'is_active',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(
                Schema::hasColumn('pelayanans', $column),
                "Column {$column} does not exist in pelayanans table"
            );
        }
    }

    /**
     * Test that foreign key columns use unsignedBigInteger.
     */
    public function test_pelayans_table_has_correct_foreign_key_columns(): void
    {
        $this->assertTrue(Schema::hasTable('pelayans'));
        $this->assertTrue(Schema::hasColumn('pelayans', 'jemaat_id'));
        $this->assertTrue(Schema::hasColumn('pelayans', 'pelayanan_id'));
    }
}
