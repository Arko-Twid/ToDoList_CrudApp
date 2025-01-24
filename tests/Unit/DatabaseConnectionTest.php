<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
    /**
     * Test if the database connection is successful.
     */
    public function test_database_connection(): void
    {
        try {
            DB::connection()->getPdo();
            $this->assertTrue(true);
        } catch (\Exception $e) {
            $this->fail('Database connection failed: ' . $e->getMessage());
        }
    }
    public  function test_fetch_records_from_table(): void{
        DB::table('ToDoTable')->insert([
            'title' => 'Test Title',
            'completed' => 0,

        ]);
        $record = DB::table('ToDoTable')->where('title', 'Test Title')->first();
        $this->assertNotNull($record);
        $this->assertEquals('Test Title', $record->title);
    }


}
