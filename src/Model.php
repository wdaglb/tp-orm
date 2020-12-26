<?php


namespace ke\model;


use ke\model\concern\Conversion;
use ke\model\concern\RelationShip;
use think\Collection;
use think\db\Query;
use think\Paginator;

/**
 * Class Model
 * @package ke\model
 * @mixin Query
 * @property mixed $name
 * @method $this scope(string|array $scope) static 查询范围
 * @method $this where(mixed $field, string $op = null, mixed $condition = null) static 查询条件
 * @method $this whereRaw(string $where, array $bind = [], string $logic = 'AND') static 表达式查询
 * @method $this whereExp(string $field, string $condition, array $bind = [], string $logic = 'AND') static 字段表达式查询
 * @method $this when(mixed $condition, mixed $query, mixed $otherwise = null) static 条件查询
 * @method $this join(mixed $join, mixed $condition = null, string $type = 'INNER', array $bind = []) static JOIN查询
 * @method $this view(mixed $join, mixed $field = null, mixed $on = null, string $type = 'INNER') static 视图查询
 * @method $this with(mixed $with, callable $callback = null) static 关联预载入
 * @method $this count(string $field = '*') static Count统计查询
 * @method $this min(string $field, bool $force = true) static Min统计查询
 * @method $this max(string $field, bool $force = true) static Max统计查询
 * @method $this sum(string $field) static SUM统计查询
 * @method $this avg(string $field) static Avg统计查询
 * @method $this field(mixed $field, boolean $except = false, string $tableName = '', string $prefix = '', string $alias = '') static 指定查询字段
 * @method $this fieldRaw(string $field) static 指定查询字段
 * @method $this union(mixed $union, boolean $all = false) static UNION查询
 * @method $this limit(mixed $offset, integer $length = null) static 查询LIMIT
 * @method $this order(mixed $field, string $order = null) static 查询ORDER
 * @method $this orderRaw(string $field, array $bind = []) static 查询ORDER
 * @method $this cache(mixed $key = null , integer|\DateTime $expire = null, string $tag = null) static 设置查询缓存
 * @method mixed value(string $field, mixed $default = null) static 获取某个字段的值
 * @method array column(string $field, string $key = '') static 获取某个列的值
 * @method $this find(mixed $data = null) static 查询单个记录
 * @method $this findOrFail(mixed $data = null) 查询单个记录
 * @method Collection|$this[] select(mixed $data = null) static 查询多个记录
 * @method $this get(mixed $data = null,mixed $with = [],bool $cache = false, bool $failException = false) static 查询单个记录 支持关联预载入
 * @method $this getOrFail(mixed $data = null,mixed $with = [],bool $cache = false) static 查询单个记录 不存在则抛出异常
 * @method $this findOrEmpty(mixed $data = null) static 查询单个记录  不存在则返回空模型
 * @method Collection|$this[] all(mixed $data = null,mixed $with = [],bool $cache = false) static 查询多个记录 支持关联预载入
 * @method $this withAttr(array $name,\Closure $closure = null) static 动态定义获取器
 * @method $this withJoin(string|array $with, string $joinType = '') static
 * @method $this withCount(string|array $relation, bool $subQuery = true) static 关联统计
 * @method $this withSum(string|array $relation, string $field, bool $subQuery = true) static 关联SUM统计
 * @method $this withMax(string|array $relation, string $field, bool $subQuery = true) static 关联MAX统计
 * @method $this withMin(string|array $relation, string $field, bool $subQuery = true) static 关联Min统计
 * @method $this withAvg(string|array $relation, string $field, bool $subQuery = true) static 关联Avg统计
 * @method $this withSearch(array $fields, array $data, string $prefix = '') static 搜索器
 * @method Paginator|$this paginate() static 分页
 */
class Model extends \think\Model
{
    use RelationShip;
    use Conversion;

}
