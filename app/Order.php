<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected  $table='order';//指定表
    protected $primaryKey = 'order_id';

    /**
     * 可以被批量赋值的属性.
     *白名单
     * @var array
     */
//    protected $fillable = ['brand_name','brand_url','brand_logo','brand_desc'];

    /**
     * 不能被批量赋值的属性
     *黑名单
     * @var array
     */
    protected $guarded = [];//因为所有都要添加所以给他空值
    /**
     * 表明模型是否应该被打上时间戳
     *关闭
     * @var bool
     */
    public $timestamps = false;


}
