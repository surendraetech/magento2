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
    protected $request;
    public function __construct(\Magento\Framework\App\Action\Context $context,
            \Magento\Framework\App\Request\Http $request,
             \Excellence\Test\Model\TestFactory $testFactory,
            \Magento\Framework\Message\ManagerInterface $messageManager) 
    { 
        $this->_testFactory = $testFactory;      
        $this->request = $request;
        $this->_messageManager = $messageManager;
        
        parent::__construct($context);    
    }
    public function execute()
    {  
        $post = $this->request->getParams();
        $model= $this->_testFactory->create();
        $model->load($post['id']);
        $model->delete($post['id']);
         $this->_messageManager->addSuccess(__('Deleted your item'));  
        $this->_redirect('*/test/');
       
    }
}
