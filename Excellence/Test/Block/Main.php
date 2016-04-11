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

//    protected function _prepareLayout() {
//        parent::_prepareLayout();
//       // if ($this->getCollection()) {
//            // create pager block for collection 
//          //  $pager = $this->getLayout()->createBlock(
//             //   'Magento\Theme\Block\Html\Pager',
//              //  'excellence.test.record.pager'
//          //  )->setAvailableLimit(array(5=>5))->setCollection(
//           //     $this->getCollection() // assign collection to pager
//         //   );
//            
//           // $this->setChild('pager', $pager);// set pager block in layout
//     //   }
//        $this->getCollection();
//        return $this;
//    }
    
    /**
     * @return string
     */
    // method for get pager html
   public function getPagerHtml()
    { 
        $pagerBlock = $this->getChildBlock('excellence_test_record_pager');
        
        if ($pagerBlock instanceof \Magento\Framework\DataObject) {
          
            /* @var $pagerBlock \Magento\Theme\Block\Html\Pager */
        //    $pagerBlock->setAvailableLimit(4);
  
            $pagerBlock->setUseContainer(
                false
            )->setShowPerPage(
                false
            )->setShowAmounts(
                false
            )->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setLimit(2)->setCollection(
                $this->getCollection()
            );
        return $pagerBlock->toHtml();
        }
  
        return $pagerBlock;
    } 
}
