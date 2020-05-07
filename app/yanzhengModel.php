<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class yanzhengModel extends Model
{
    //

    protected $table="yanzheng";
	protected $primaryKey ="id";

	//关闭时间戳
public $timestamps=false;

// 黑名单属性
protected $guarded=[];




}
