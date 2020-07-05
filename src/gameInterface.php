<?php

namespace Brain\Game\GameInterface;

use Brain\Games\Calculator;
use Brain\Games\Even;
use Brain\Games\Gcd;
use Brain\Games\Progression;
use Brain\Games\Prime;

use function Brain\Games\gameCli\{showHello, getName, showFinish, showSuccess, showError};

function run($gameName)
{
    define("ROUNDSCOUNT", 3);

    $rules = call_user_func('Brain\Games\\' . $gameName . '\getRules');
    showHello($rules);

    $userName = getName();

    $noErrors = true;
    for ($i = 0; $i < ROUNDSCOUNT; $i++) {
        $arGameRoundResult = call_user_func('Brain\Games\\' . $gameName . '\gameRound');

        if ($arGameRoundResult['answer'] != $arGameRoundResult['solution']) {
            showError($arGameRoundResult['answer'], $arGameRoundResult['solution'], $userName);
            $noErrors = false;
            break;
        } else {
            showSuccess();
        }
    }

    if ($noErrors) {
        showFinish($userName);
    }
}
