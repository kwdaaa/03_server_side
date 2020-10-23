<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controllerを継承したMessageController
class CommentsController extends Controller
{

    public function messages($howMessage)
    {

        $morningMessage = 'おはよう';
        $afternoonMessage = 'こんにちは';
        $eveningMessage = 'こんばんは';
        $nightMessage = 'おやすみ';

        $arrayMessage = [$morningMessage, $afternoonMessage, $eveningMessage, $nightMessage];


        // howMessageに「morning、afternoon、evening、night」のいずれかが入った場合の処理
        // swich文で、howMessageに入る値によって処理を切り替える。
        switch ($howMessage) {
                // morningの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'morning':
                $howMessageToShow = '朝のあいさつ';
                $messageToShow = $morningMessage;
                break;

                // afternoonの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'afternoon':
                $howMessageToShow = '昼のあいさつ';
                $messageToShow = $afternoonMessage;
                break;

                // eveningの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'evening':
                $howMessageToShow = '夕方のあいさつ';
                $messageToShow = $eveningMessage;
                break;

                // nightの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'night':
                $howMessageToShow = '夜のあいさつ';
                $messageToShow = $nightMessage;
                break;

                // freewordの場合 $messageに入った値（がんばって など）を$messageToShow 変数の中にいれる。
            case 'random':
                $howMessageToShow = 'ランダムなメッセージ';
                $messageToShow = $arrayMessage[rand(0, count($arrayMessage) - 1)];
                break;

                // その他の値が入った場合
            default:
                $howMessageToShow =  'comments/ のあとに morning、afternoon、evening、night、random 以外の値が入っています。';
                break;
        }

        // あいさつ文の形態が入った $howMessageToShow を howMessageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // あいさつ文が入った $messageToShow を messageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // 'comments.show'は 「comments」フォルダの中の「show.blade.php」ファイルの中
        return view('comments.show', ['howMessageToShow' => $howMessageToShow], ['messageToShow' => $messageToShow]);
    }


    public function freeMessages($howMessage, $setMessage)
    {
        

        switch ($howMessage) {
                // freewordの場合 $setMessageに入った値（がんばって など）を$messageToShow 変数の中にいれる。
            case 'freeword':
                $howMessageToShow = '自由なメッセージ';
                $messageToShow = $setMessage;
                break;

                // その他の値が入った場合
            default:
                $howMessageToShow =  'comments/ のあとに freeword 以外の値が入っています。';
                break;
        }

        // あいさつ文の形態が入った $howMessageToShow を howMessageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // あいさつ文が入った $messageToShow を messageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // 'comments.show'は 「comments」フォルダの中の「show.blade.php」ファイルの中
        return view('comments.show', ['howMessageToShow' => $howMessageToShow], ['messageToShow' => $messageToShow]);
    }
}
