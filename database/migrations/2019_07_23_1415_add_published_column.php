<?php

use Illuminate\Database\Migrations\Migration;

class AddPublishedColumn extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        $statement = <<<'SQL'
            ALTER TABLE lost_pets ADD COLUMN published boolean NOT NULL DEFAULT false;
            ALTER TABLE found_pets ADD COLUMN published boolean NOT NULL DEFAULT false;
SQL;

        DB::unprepared($statement);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $statement = <<<'SQL'
            ALTER TABLE lost_pets DROP COLUMN published;
            ALTER TABLE found_pets DROP COLUMN published;
SQL;

        DB::unprepared($statement);
    }
}
