<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author alexandre
 */
class Employee extends Eloquent {
    
    public function orders(){
        
        $this->hasMany('orders');
    }
}
