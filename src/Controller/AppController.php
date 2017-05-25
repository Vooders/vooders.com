<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * a change
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

    /**
  * Before Filter Method
  */
  public function beforeFilter(Event $event){}


    /**
    * Add all auth condidtions for this controller here!
    */
    public function isAuthorized($user){
        if($user['id'] == 1){
            return true;
        }
        return false;
    }

  
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
      parent::initialize();
      // P-R-G Search plugin
      /*
      // Enable all indexes to use it
      if ($this->request->action === 'index'):
        $this->loadComponent('Search.Prg');
      endif;
      */
      $this->loadComponent('Flash');
      $this->loadComponent('Auth', [
        'loginRedirect' => [
          'controller' => 'Users',
          'action'=> 'dashboard'
        ],
        'logoutRedirect'=>[
          'controller'=>'Users',
          'action'=>'login'
        ],
        'authorize'=>'Controller',
        'unauthorizedRedirect'=>['controller'=>'Users', 'action'=>'dashboard']
      ]);
      // Allow the display action so our pages controller
      // continues to work.
      $this->Auth->allow(['display']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
