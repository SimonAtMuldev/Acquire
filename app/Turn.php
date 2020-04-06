<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    /** trick: This table does not have an auto increment attribute.
     *         So we need to let the Model know.
     *
     */
    public $incrementing = false;

    public $fillable = ['player_id', 'game_id', 'location', 'filled', 'id'];

    public function game() {
        $this->belongsTo('App\Game', 'game_id');
    }

}
