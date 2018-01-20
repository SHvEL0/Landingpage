<?php

namespace App\Http\Controllers;

use App\Page;
use App\People;
use App\Portfolio;
use App\Service;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function execute(Request $request){

    	$pages=Page::all();
    	$portfolio=Portfolio::get(array('name','images','filter'));
    	$peoples=People::take(3)
    			->get();
    	$services=Service::where('id','>','25')
    			->get();

    			$menu=array();
    			foreach($pages as $page){
    				$item=array(
    					'title' =>$page->name,
    					'alias'=>$page->alias
    				);
    				array_push($menu,$item);
    			}
    			
    			$item=array(
    				'title' =>'სერვისები' , 
    				'alias' =>'service'
    			);
    			array_push($menu,$item);

    			$item=array(
    				'title' =>'პორტფოლიო' , 
    				'alias' =>'Portfolio'
    			);
    			array_push($menu,$item);

    			$item=array(
    				'title' =>'გუნდი' , 
    				'alias' =>'team'
    			);
    			array_push($menu,$item);

 				$item=array(
    				'title' =>'კონტაქტი' , 
    				'alias' =>'contact'
    			);
    			array_push($menu,$item);




    	return view('site.index',array(
    		'menu' =>$menu ,
    		'pages'=>$pages,
    		'services'=>$services,
    		'portfolio'=>$portfolio,
    		'people'=>$peoples


    		 )
    );
    }
}