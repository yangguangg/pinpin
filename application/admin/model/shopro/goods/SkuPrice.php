<?php

namespace app\admin\model\shopro\goods;

use think\Model;
use traits\model\SoftDelete;

class SkuPrice extends Model
{

    use SoftDelete;

    

    // 表名
    protected $name = 'shopro_goods_sku_price';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    protected $deleteTime = 'deletetime';

    // 追加属性
    protected $append = [
        'goods_sku_text'
    ];
    
    
    public function getImageAttr($value, $data)
    {
        if (!empty($value)) return cdnurl($value, true);
        return $value;

    }

    public function getGoodsSkuTextAttr($value, $data)
    {
        return array_filter(explode(',', $value));
    }




}
