<?php
    @ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The King's Tour</title>
        <style>
            table {
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div align="center">
        <?php
        include_once('lib/Board.php');
        include_once('lib/King.php');


        $board = new \Board(10, 10);
        $king = new \King($board, 0, 0);

        $king->start();

        echo "<p>Espaços vazios: " . $board->count_empty_spaces() . "</p>";
        echo "<p>Movimentos: " . $board->countMoves() . "</p>";
        $board->output_board();

        echo '<p>Tempo de execução: ' . $king->getExecutionElapsed() . '</p>';
        ?>
        </div>
    </body>
</html>
