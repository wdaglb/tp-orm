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

namespace ke\model\concern;

use think\Collection;
use think\db\Query;
use think\Exception;
use think\Loader;
use think\Model;
use think\model\Relation;
use think\model\relation\BelongsTo;
use think\model\relation\BelongsToMany;
use think\model\relation\HasMany;
use think\model\relation\HasManyThrough;
use think\model\relation\HasOne;
use think\model\relation\MorphMany;
use think\model\relation\MorphOne;
use think\model\relation\MorphTo;

/**
 * 模型关联处理
 */
trait RelationShip
{
    /**
     * 绑定（一对一）关联属性到当前模型
     * @access protected
     * @param  string   $relation    关联名称
     * @param  array    $attrs       绑定属性
     * @return $this
     * @throws Exception
     */
    public function bindAttr($relation, array $attrs = [])
    {
        $relation = $this->getRelation($relation);

        foreach ($attrs as $key => $attr) {
            $key   = is_numeric($key) ? $attr : $key;
            $value = $this->getOrigin($key);

            if (!is_null($value)) {
                throw new Exception('bind attr has exists:' . $key);
            }

            $this->setAttr($key, $relation ? $relation->getAttr($attr) : null);
        }

        return $this;
    }



    /**
     * HAS ONE 关联定义
     * @access public
     * @param  string $model      模型名
     * @param  string $foreignKey 关联外键
     * @param  string $localKey   当前主键
     * @return HasOne
     */
    public function hasOne($model, $foreignKey = '', $localKey = '')
    {
        // 记录当前关联信息
        $model      = $this->parseModel($model);
        $localKey   = $localKey ?: $this->getPk();
        $foreignKey = $foreignKey ?: $this->getForeignKey($this->name);

        return new \ke\model\relation\HasOne($this, $model, $foreignKey, $localKey);
    }

}
