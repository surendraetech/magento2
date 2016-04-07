<?php
namespace Excellence\Test\Controller\Index;
 
 
class Edit extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
       \Excellence\Test\Model\TestFactory $testFactory)
    {
        $this->_testFactory = $testFactory;     
        return parent::__construct($context);
    }
     
    public function execute()
    {
       $post = $this->getRequest()->getPostValue();
        $test = $this->_testFactory->create();
        $test->load($post['id']);
        $test->setTitle($post['title']);
        $test->setIsActive($post['is_active']);
        $test->save();
        $this->_redirect('*/test/');
        $this->messageManager->addSuccess(__('Your record successfully updated')); 
    } 
}

