<?php
require_once('Board.php');

class King {

    private $board = null;
    private $pos_x = 0;
    private $pos_y = 0;
    private $start_time = 0;
    private $elapsed_time = 0;
    private $moves_count_total = 0;

    public function __construct(Board $board, $x = 0, $y = 0) {
        $this->board = $board;
        $this->board->make_move($x, $y);
        $this->pos_x = $x;
        $this->pos_y = $y;

        list($usec, $sec) = explode(' ', microtime());
        $this->start_time = (float) $sec + (float) $usec;
    }

    public function fill($sum = true) {
        $this->moves_count_total++;
        for ($y = 1; $y < $this->board->getHeight(); $y++) {
            if (!$sum) {
                $this->board->make_move($this->pos_x, $this->pos_y, $this->moves_count_total);
                $this->pos_y++;
                $this->moves_count_total++;
            } else {
                $this->board->make_move($this->pos_x, $this->pos_y, $this->moves_count_total);
                $this->pos_y--;
                $this->moves_count_total++;
            }
            $val = $this->moves_count_total;
            if ($this->moves_count_total >= ($this->board->getHeight() * $this->board->getWidth())) {
                $val = "XX";
            }
            $this->board->make_move($this->pos_x, $this->pos_y, $val);
        }
    }

    public function getExecutionElapsed() {
        return $this->elapsed_time;
    }

    public function start() {
        $count = $this->board->count_empty_spaces();
        while ($count--) {
            $direction = (($this->pos_y + 1) == $this->board->getHeight());
            $this->fill($direction);
            $this->pos_x++;
        }
        list($usec, $sec) = explode(' ', microtime());
        $script_end = (float) $sec + (float) $usec;
        $this->elapsed_time = round($script_end - $this->start_time, 5);
    }

}