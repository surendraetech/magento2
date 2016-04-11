<?php
namespace Excellence\Test\Controller\Test;
 
 
class Index extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
         \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {    $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }
     
    public function execute()
    { //  $this->_view->loadLayout();
      //  $this->_view->renderLayout();
      return $this->resultPageFactory->create(); 
    } 
}

