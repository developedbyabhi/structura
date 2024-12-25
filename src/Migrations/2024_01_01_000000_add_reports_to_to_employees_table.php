<?php
namespace OrganizationalChart\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReportsToToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('reports_to')->nullable()->after('name');
            $table->foreign('reports_to')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['reports_to']);
            $table->dropColumn('reports_to');
        });
    }
}

