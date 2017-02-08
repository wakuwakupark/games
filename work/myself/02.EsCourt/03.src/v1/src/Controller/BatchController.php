<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;

class BatchController extends AppController
{
    public function beforeRender(Event $event){
        parent::beforeRender($event);

        if(!$this->isBatch()){
            throw new UnauthorizedException("Administration Only");
        }
    }

    /**
    * クロールを外部から呼び出す
    * @param 管理者のID nullの場合は全ての管理者に対して実行
    */
    public function crawle($adminId = null){
        //crawlerの実行
        $this->loadModel("Administrators");

        if ($adminId == null) {
            $administrators = $this->Administrators->find()->where(["crawler_path !=" => NULL])->all();
        } else {
            $administrators = [$this->Administrators->find()->where(["crawler_path !=" => NULL])->andWhere(["id" => $adminId])->first()];
        }

        foreach ($administrators as $administrator) {
            $command = $administrator->crawler_path;
            $json = $this->doOSCommond($command);
        }
    }

    /**
    * JSONで取得された枠情報をDBへ格納する
    * @param JSONで取得されるデータ
    */
    private function saveFrames($json){

    }


    /**
    * 引数のOSコマンドを実行する
    * @param 結果の文字列
    */
    private function doOSCommond($commnad){
        return shell_exec($commnad);
    }

}
