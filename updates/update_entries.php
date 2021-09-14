<?php namespace Pensoft\Calendarextension\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateEntries extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('christophheich_calendar_entries', 'materials')) {
            Schema::table('christophheich_calendar_entries', function ($table) {
                $table->text('materials')->nullable();
				$table->boolean('is_project_organized')->nullable();
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('christophheich_calendar_entries', 'materials')) {
            Schema::table('christophheich_calendar_entries', function ($table) {
                $table->dropColumn('materials');
                $table->dropColumn('is_project_organized');
            });
        }
    }
}
