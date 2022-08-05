<?php


class Node
{
    public $score = 0;

    public $position = 0;

    public $left = null;

    public $right = null;

    public function __construct($score, $position)
    {
        $this->score = $score;
        $this->position = $position;
    }
}

function tree($ranked, &$node, $pos = 0)
{
    $mid = (int)(count($ranked) / 2);
    $node = new Node($ranked[$mid], $pos + $mid + 1);

    $left = array_slice($ranked, 0, $mid);
    if ($left) {
        tree($left, $node->left, $pos);
    }

    $right = array_slice($ranked, $mid + 1);
    if ($right) {
        tree($right, $node->right, $pos + $mid + 1);
    }
}

/*
 * Complete the 'climbingLeaderboard' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY ranked
 *  2. INTEGER_ARRAY player
 */

function climbingLeaderboard($ranked, $player)
{
    $values = array_values(array_unique($ranked));
    $root = null;
    tree($values, $root);
    $result = [];
    foreach ($player as $p) {
        $tmp = $root;
        while (true) {
            if ($tmp->score == $p) {
                $result[] = $tmp->position;
                break;
            }

            if ($tmp->score < $p) {
                if ($tmp->left == null) {
                    $result[] = $tmp->position == 1 ? 1 : $tmp->position;
                    break;
                }
                $tmp = $tmp->left;
            }

            if ($tmp->score > $p) {
                if ($tmp->right == null) {
                    $result[] = $tmp->position + 1;
                    break;
                }
                $tmp = $tmp->right;
            }
        }
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$ranked_count = intval(trim(fgets(STDIN)));

$ranked_temp = rtrim(fgets(STDIN));

$ranked = array_map('intval', preg_split('/ /', $ranked_temp, -1, PREG_SPLIT_NO_EMPTY));

$player_count = intval(trim(fgets(STDIN)));

$player_temp = rtrim(fgets(STDIN));

$player = array_map('intval', preg_split('/ /', $player_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = climbingLeaderboard($ranked, $player);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
