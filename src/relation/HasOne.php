<?php


namespace ke\model\relation;


use think\Exception;

class HasOne extends \think\model\relation\HasOne
{
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
