<?php


namespace Api\view\Block;

class Display extends \Magento\Framework\View\Element\Template{

    public function __construct(\Magento\Framework\View\Element\Template\Context $context){
        parent::__construct($context);
    }

    public function sayhello(){
        return "Hello Anuj new page created for Almenea";
    }

}

?>