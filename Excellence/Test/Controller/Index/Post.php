<?php
namespace Excellence\Test\Controller\Index;

class Post extends \Magento\Framework\App\Action\Action
{
    /**
     * Show Contact Us page
     *
     * @return void
     */
    protected $_objectManager;
    
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\ObjectManagerInterface $objectManager) 
    {
        $this->_objectManager = $objectManager;
        parent::__construct($context);    
    }
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $model = $this->_objectManager->create('Excellence\Test\Model\Test');
        $model->setData($post);
        $model->save();
        $this->_redirect('*/test/');
        $this->messageManager->addSuccess(__('Your record successfully added'));    
    }
}
