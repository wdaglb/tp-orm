<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace ke\model\relation;

use think\Exception;
use think\Model;

/**
 * Class OneToOne
 * @package think\model\relation
 *
 */
abstract class OneToOne extends \think\model\relation\OneToOne
{
    /**
     * 绑定关联属性到父模型
     * @access protected
     * @param  Model $result    关联模型对象
     * @param  Model $model   父模型对象
     * @return void
     * @throws Exception
     */
    protected function bindAttr($model, &$result)
    {
        foreach ($this->bindAttr as $key => $attr) {
            $key   = is_numeric($key) ? $attr : $key;
            $value = $result->getOrigin($key);

            if (!is_null($value)) {
                throw new Exception('bind attr has exists:' . $key);
            }

            $result->setAttr($key, $model ? $model->getAttr($attr) : null);
        }
    }
}
