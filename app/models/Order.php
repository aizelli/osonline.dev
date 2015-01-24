<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author alexandre
 */
class Order extends Eloquent {
    
    public function customers(){
        
        $this->belongsTo('customers');
    }
    
    public function employeers(){
        
        $this->belongsTo('employees');
    }
    
    public function itens(){
        
        $this->hasMany('itens');
    }
}
