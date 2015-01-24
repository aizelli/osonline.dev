<?php


class Customer extends Eloquent{
    
    public function orders(){
        
        $this->hasMany('orders');
    }
}
