<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fu extends Model
{
    
   	protected $table="fu";
	protected $primaryKey ="c_id";

	//关闭时间戳
public $timestamps=false;

// 黑名单属性
protected $guarded=[];


    }
