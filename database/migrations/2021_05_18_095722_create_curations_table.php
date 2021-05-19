<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curations', function (Blueprint $table)
        {
            $table->id('curation_id');
            $table->integer('user_id');
            $table->char('uuid', 36);

            $table->string('title');
            $table->string('alt_titles', 511)->nullable();
            $table->enum('library', ['arcade', 'theatre']);
            $table->string('series')->nullable();
            $table->string('developer')->nullable();
            $table->string('publisher')->nullable();
            //All the stupid options, that are currently in Infinity
            /*$table->enum('play_mode', [
                'Single Player',
                'Single Player; Multiplayer',
                'Multiplayer',
                'Cooperative',
                'Multiplayer; Single Player',
                'Cooperative; Single Player',
                'Cooperative; Multiplayer; Single Player',
                'Single Player; Cooperative',
                'Single Player; Cooperative; Multiplayer',
                'Single Player; Multiplayer; Cooperative',
                'Singleplayer',
                'Single Player, Multiplayer',
                'Single Player and Multiplayer',
                'Single Player; 2-player Cooperative',
                'Single Player Multiplayer',
                'Single Player; Muliplayer',
                'Multiplayer; Singleplayer'
            ]);*/
            //Only the options, that make sense
            $table->enum('play_mode', [
                'Single Player',
                'Multi Player',
                'Cooperative',
                'Single Player; Multi Player',
                'Single Player; Cooperative',
                'Multi Player; Cooperative',
                'Single Player; Multiplayer; Cooperative'
            ]);
            $table->char('release_date', 10)->nullable();
            $table->string('version')->nullable();
            $table->string('languages')->nullable();
            $table->boolean('extreme');
            $table->string('tags', 1023);
            $table->string('tag_categories', 1023);
            $table->string('source', 511);
            $table->enum('platform', [
                '3D Groove GX',
                '3DVIA Player',
                'AXEL Player',
                'ActiveX',
                'Alambik',
                'AnimaFlex',
                'Atmosphere',
                'Authorware',
                'Burster',
                'Cult3D',
                'DeepV',
                'Flash',
                'HTML',
                'Hyper-G',
                'Hypercosm',
                'Java',
                'LiveMath',
                'Octree',
                'Play 3D',
                'ProtoPlay',
                'Pulse',
                'REBOL',
                'ShiVa',
                'Shockwave',
                'Silverlight',
                'TCL',
                'Unity',
                'VRML',
                'Viscape',
                'Visual WebMap',
                'Vitalize',
                'Xara Plugin',
                'GoBit',   //Not showed in Core
                'PopCap',  //Not showed in Core
            ]);
            $table->string('application_path');
            $table->string('launch_cmd', 511);
            $table->text('notes')->nullable();
            $table->text('original_description')->nullable();
            $table->text('curator_notes')->nullable();
            $table->string('mount_parameters')->nullable();
            $table->string('message', 511)->nullable();
            $table->string('extras_folder')->nullable();
            $table->text('alt_apps_names')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curations');
    }
}
