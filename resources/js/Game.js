/**
 * Created by: Simon Assouline on 24/3/20.
 * Updated:    24/3/20
 * Purpose:
 * Copyright 2017 (c), muldev (Multi Development Studios)
 * All rights reserved.
 */
class Game {
    constructor() {
        this.InProgress = true;
        this.winner = null;
        this.currentTurn = Game.Player1;
        this.movesMade = 0;  // Moves counter, 5 moves should equal to 5 fills
        this.squares = new Array(196).fill().map( s => new Square() ); // 14x14
    }

}

Game.Player1 = true;
Game.Player2 = false;
Game.Player3 = false;
Game.Player4 = false;
Game.Player5 = false;
