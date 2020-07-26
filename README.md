# TeamAPI
チーム関連のAPI  
チャット非表示、フレンドリーファイア禁止機能標準搭載

サーバーのpluginsフォルダに入れれば使えるようになります

use文  
```use matsuo\TeamAPI\TeamAPI```

インスタンスの取得例
```TeamAPI::getInstance()->jointeam($teamname, $player);```

使える関数  
$playerはプレイヤーオブジェクトとします  
チームに参加する  
```jointeam($teamname, $player)```  
チームを抜ける  
```leaveteam($teamname, $player)```  
チーム情報を取得する（戻り値は[チーム名、メンバー]のような形の配列で帰ってきます）  
```getteam（$player）```  
2人のプレイヤーが同じチームか確認する（返り値はbool型です）  
```sameteam($playera, $playerb)```  
SPECIAL THANKS  
WhiteGrouseさん  
rain1208さん  
らっしゅさん  


**問題点等あればお気軽にプルリクして頂けると助かります。**
