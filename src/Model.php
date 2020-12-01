<?php


namespace ke\model;


use ke\model\concern\Conversion;
use ke\model\concern\RelationShip;

class Model extends \think\Model
{
    use RelationShip;
    use Conversion;

}
