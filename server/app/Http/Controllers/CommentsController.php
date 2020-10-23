<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Controllerを継承したMessageController
class CommentsController extends Controller
{

    public function messages($time_zone)
    {
        $morningMessage = '朝のあいさつ';
        $afternoonMessage = '昼のあいさつ';
        $eveningMessage = '夕方のあいさつ';
        $nightMessage = '夜のあいさつ';



        $messageArray = array($morningMessage => 'おはよう', $afternoonMessage => 'こんにちは', $eveningMessage => 'こんばんは', $nightMessage => 'おやすみ');


        // time_zoneに「morning、afternoon、evening、night」のいずれかが入った場合の処理
        // swich文で、time_zoneに入る値によって処理を切り替える。
        switch ($time_zone) {
                // morningの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'morning':
                $time_zoneToShow = $morningMessage;
                $messageToShow = $messageArray[$morningMessage];
                break;

                // afternoonの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'afternoon':
                $time_zoneToShow = $afternoonMessage;
                $messageToShow = $messageArray[$afternoonMessage];
                break;

                // eveningの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'evening':
                $time_zoneToShow = $eveningMessage;
                $messageToShow = $messageArray[$eveningMessage];
                break;

                // nightの場合 $messageToShow 変数の中にあいさつ文をいれる。
            case 'night':
                $time_zoneToShow = $nightMessage;
                $messageToShow = $messageArray[$nightMessage];
                break;

                // freewordの場合 $messageに入った値（がんばって など）を$messageToShow 変数の中にいれる。
            case 'random':
                $time_zoneToShow = 'ランダムなメッセージ';
                $messageArrayKey = array_rand($messageArray, 1);
                $messageToShow = $messageArray[$messageArrayKey];
                break;

                // その他の値が入った場合、$time_zoneToShow の中には空の文字列をいれる。
            default:
                $time_zoneToShow = '';
                $messageToShow =  'comments/ のあとに morning、afternoon、evening、night、random 以外の値が入っています。';
                break;
        }

        // あいさつ文の形態が入った $time_zoneToShow を time_zoneToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // あいさつ文が入った $messageToShow を messageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // 'comments.show'は 「comments」フォルダの中の「show.blade.php」ファイルの中
        return view('comments.show', ['time_zoneToShow' => $time_zoneToShow], ['messageToShow' => $messageToShow]);
    }


    public function freeMessages($time_zone, $message)
    {


        switch ($time_zone) {
                // freewordの場合 $messageに入った値（がんばって など）を$messageToShow 変数の中にいれる。
            case 'freeword':
                $time_zoneToShow = '自由なメッセージ';
                $messageToShow = $message;
                break;

                // その他の値が入った場合、$time_zoneToShow の中には空の文字列をいれる。
            default:
                $time_zoneToShow = '';
                $messageToShow =  'comments/ のあとに freeword 以外の値が入っています。';
                break;
        }

        // あいさつ文の形態が入った $time_zoneToShow を time_zoneToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // あいさつ文が入った $messageToShow を messageToShowキーに入れて「comments」フォルダの中の「show.blade.php」ファイルの中でキーを使って計算結果を呼び起こす。
        // 'comments.show'は 「comments」フォルダの中の「show.blade.php」ファイルの中
        return view('comments.show', ['time_zoneToShow' => $time_zoneToShow], ['messageToShow' => $messageToShow]);
    }
}
