<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table="login";
	protected $primaryKey ="id";

	//关闭时间戳
public $timestamps=false;

// 黑名单属性
protected $guarded=[];



}
