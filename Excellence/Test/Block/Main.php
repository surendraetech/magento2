<?php

namespace Excellence\Test\Block;

class Main extends \Magento\Framework\View\Element\Template {

    public function __construct(
    \Magento\Framework\View\Element\Template\Context $context, \Excellence\Test\Model\TestFactory $testFactory
    ) {
        $this->_testFactory = $testFactory;
        parent::__construct($context);
        //get collection of data 
        $collection = $this->_testFactory->create()->getCollection();
        $this->setCollection($collection);
        $this->pageConfig->getTitle()->set(__('My Grid List'));
    }

    protected function _prepareLayout() {
        parent::_prepareLayout();
        if ($this->getCollection()) {
            // create pager block for collection 
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'excellence.test.record.pager'
            )->setAvailableLimit(array(5=>5))->setCollection(
                $this->getCollection() // assign collection to pager
            );
            
            $this->setChild('pager', $pager);// set pager block in layout
        }
        return $this;
    }
    
    /**
     * @return string
     */
    // method for get pager html
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }   
}
