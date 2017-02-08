<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = [
        'Flash',
        'RequestHandler',
        'Security',
        'Csrf'
    ];

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        //Template側の制御用に配置
        $this->set('controller', $event->subject()->request->params['controller']);
        $this->set('action', $event->subject()->request->params['action']);
    }


    //AJAX用のバリデーションメソッド
    public function validate(){
        $this->autoRender = false;
        $name = $this->request->data['name'];
        $data = $this->request->data['data'];
        try{
            $action = 'validate'.ucfirst($name);
            $msg = $this->{$action}($data);
            if($msg == null){
                echo json_encode(["result" => true, "msg" => "利用できます。"]);
            }else{
                echo json_encode(["result" => false, "msg" => $msg]);
            }
        }catch (Exception $e) {
            echo json_encode(["result" => true, "msg" => "利用できます。"]);
            return;
        }
    }


    protected function validateAll($user){
        //validateXXXの関数を全て実行
        $flag = true;
        $methods = get_class_methods($this);
        for( $i = 0; $i < count($methods) ; $i ++ ){
            if(strstr($methods[$i], 'validate')){
                $params = explode("validate", $methods[$i]);
                if($params[1] == "" || $params[1] == "All" || $params[1] == "AllWithRowData" ){
                    continue;
                }
                //validateXXXX実行
                try {
                    $msg = $this->{$methods[$i]}($user->{lcfirst($params[1])});
                    if($msg != null){
                        $this->Flash->error($msg);
                        $flag = false;
                    }
                } catch (Exception $e) {
                     continue;
                }
            }
        }

        return $flag;
    }

    //バッチ処理からのリクエストであることを確認する
    protected function isBatch(){
        $this->loadModel("Systems");
        $systems = $this->Systems->find()->where(["key" => "batchkey"])->first();
        $batchKey = $systems->value;
        $reqKey = $this->request->query["batchkey"];

        if(!is_null($reqKey) && $batchKey == $reqKey){
            return true;
        }else {
            return false;
        }
    }

}
