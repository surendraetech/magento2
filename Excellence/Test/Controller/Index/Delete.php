<?php
namespace Excellence\Test\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action
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
        $post = $this->getRequest()->getParams();
        $model = $this->_objectManager->create('Excellence\Test\Model\Test');
        $model->load($post['id']);
        $model->delete($post['id']);
        $this->_redirect('*/test/');
        $this->messageManager->addSuccess(__('Deleted your item'));    
    }
}
