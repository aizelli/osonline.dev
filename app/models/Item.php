<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Product
 *
 * @author alexandre
 */
class Item extends Eloquent {

    public function orders() {
        
        return $this->belongsTo('Order');
    }

}