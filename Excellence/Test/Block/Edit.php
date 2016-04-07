<?php

namespace Excellence\Test\Block;

class Edit extends \Magento\Framework\View\Element\Template {

    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context, \Excellence\Test\Model\TestFactory $testFactory
    ) {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
    }

    protected function _prepareLayout() {
        $post = $this->getRequest()->getParams();
        $test = $this->_testFactory->create();
        $test->load($post['id']);
       // print_r($test->getData());
        $this->setTestModel($test);
       // return $test->getData();
    }

}
