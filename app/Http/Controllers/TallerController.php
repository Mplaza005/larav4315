<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TallerController extends Controller
{


    public function create(){

        return view('formulario');

    }

    public function store(Request $request){

        $num1=$request->num1;
        $num2=$request->num2;


        $acu1=0;
        $acu2=0;
        
        for ($i=1;$i<$num1 ; $i++)
        {
           if($num1 % $i==0){
            $acu1=$acu1+$i;
            }
           
        }

        for ($i=1;$i<$num2 ; $i++)
        {
           if($num2 % $i==0){
            $acu2=$acu2+$i;
            }
           
        }
       
        if($acu1==$num2 && $acu2==$num1 ){
            return'son numeros amigos';
          }
        else{
            return 'no son numeros amigos';
        }  


    }


        
     



    }


    



