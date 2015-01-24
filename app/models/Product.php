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
class Product extends Eloquent {

    public function suppliers() {
        
        return $this->belongsTo('Supplier');
    }

}
