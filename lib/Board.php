<?php

Class Board {

    private $width = 8;
    private $height = 8;
    private $board = array();
    private $moves = 0;

    public function __construct($w, $h) {
        $this->width = $w;
        $this->height = $h;
        $this->moves = $w * $h;

        for ($x = 0; $x <= $w; $x++) {
            for ($y = 0; $y <= $h; $y++) {
                $this->board[$x][$y] = '0';
            }
        }
    }

    public function getWidth() {
        return $this->width;
    }

    public function countMoves() {
        return $this->moves;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getPosStatus($x, $y) {
        return $this->board[$y][$x];
    }

    public function make_move($x = 0, $y = 0, $val = 'X') {
        if (($x <= $this->width) && ($y <= $this->height)) {
            if ($this->board[$y][$x] == '0') {
                $this->board[$y][$x] = $val;
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function count_empty_spaces() {
        $count = 0;

        for ($y = 0; $y <= ($this->height - 1); $y++) {
            for ($x = 0; $x <= $this->width - 1; $x++) {
                if ($this->board[$y][$x] == '0') {
                    $count++;
                }
            }
        }

        return $count;
    }

    public function output_board() {
        echo "<table>";
        for ($y = 0; $y <= ($this->height - 1); $y++) {

            if ($y % 2) {
                $color = '#FFF';
                $font_color = 'black';
            } else {
                $color = '#000';
                $font_color = 'white';
            }

            echo "<tr>";
            for ($x = 0; $x <= $this->width - 1; $x++) {
                if ($this->board[$y][$x] == '0') {
                    echo "<td style='width: 50px; height: 50px; color: {$font_color}' bgcolor='{$color}' border='1'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                } else {
                    if ($this->board[$y][$x] == 'X') {
                        echo "<td style='width: 50px; height: 50px;' bgcolor='{$color}'><img src='assets/img/king.png' height='50' /></td>";
                    } else {
                        if ($this->board[$y][$x] == 'XX') {
                            echo "<td style='width: 50px; height: 50px;' bgcolor='{$color}'><img src='assets/img/king_win.png' height='50' /></td>";
                        } else {
                            echo "<td style='width: 50px; height: 50px; text-align: center; color: {$font_color}' bgcolor='{$color}' border='1'>" . $this->board[$y][$x] . "</td>";
                        }
                    }
                }
                if ($color == '#FFF') {
                    $color = '#000';
                    $font_color = 'white';
                } else {
                    $color = '#FFF';
                    $font_color = 'black';
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

}