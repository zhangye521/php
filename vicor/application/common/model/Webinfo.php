<?php /**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/7/11
 * Time: 22:18
 */

namespace app\common\model;
use think\Model;

class Webinfo extends Model
{
    public function getinfo(){
        return $this->find();
    }
}