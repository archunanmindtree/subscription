<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*	@Purpose: JQGrid - Excel write helper
* 	@Author : Narendra Singh
* 	@Date : 27st Nov 2014 
*/ 
require_once APPPATH."/third_party/PHPExcel.php"; 
 
class Excel extends PHPExcel { 
    public function __construct() { 
        parent::__construct(); 
    } 
}