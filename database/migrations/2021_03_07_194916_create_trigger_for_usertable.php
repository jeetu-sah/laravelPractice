<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerForUsertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::unprepared("
                    DROP TRIGGER IF EXISTS laravelpractice.user_action_log;
                    CREATE TRIGGER user_action_log 
                    BEFORE DELETE ON users
                    FOR EACH ROW 
                        INSERT INTO user_logs
                        SET action = 'delete',
                            user_id = OLD.id,
                            name = OLD.name,
                            created_at = NOW(),
                            updated_at = NOW();
                    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(" DROP TRIGGER IF EXISTS laravelpractice.user_action_log;");
    }
}
