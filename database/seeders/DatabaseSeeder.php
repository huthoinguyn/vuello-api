<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{

    /**
     * Seed the application's database.
     */
    public function run()
    : void{
        // \App\Models\User::factory(10)->create();

        $user = User::factory()
                    ->create(['email' => 'test@gmail.com', 'password' => bcrypt('secret')]);

        $boards = Board::factory(10)->for($user, 'owner')->create();

        // \App\Models\Column::factory(10)->create();

        foreach ($boards as $board){
            $column = Column::factory()->create([
                'board_id' => $board->id
            ]);

            Card::factory(50)->create([
                'column_id'   => $column->id,
                'board_id'    => $board->id,
                'created_by'  => $user->id,
                'assigned_to' => $user->id,
            ]);
        }
    }
}
