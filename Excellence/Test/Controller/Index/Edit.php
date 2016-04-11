<?php
namespace Excellence\Test\Controller\Index;
 
 
class Edit extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $request;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
       \Excellence\Test\Model\TestFactory $testFactory,
        \Magento\Framework\App\Request\Http $request,    
        \Magento\Framework\Message\ManagerInterface $messageManager)
    {  
        $this->request = $request;
        $this->_messageManager = $messageManager;
        $this->_testFactory = $testFactory;     
        return parent::__construct($context);
    }
     
    public function execute()
    {
        //$this->addMessages($this->_messageManager->getMessages(true));
       $post = $this->request->getPost();
        $test = $this->_testFactory->create();
        $test->load($post['id']);
        $test->setTitle($post['title']);
        $test->setIsActive($post['is_active']);
        $test->save();
        // $noticeMessage = 'The billing agreement "r15" has been canceled.';
        //  $this->_messageManager->method('addNoticeMessage')->with($noticeMessage); 
      
         $resultRedirect = $this->resultRedirectFactory->create();
         $resultRedirect->setPath('*/test/');
           $this->_messageManager->addError('test message');
        //$this->_messageManager->expects($this->once())->method('addNoticeMessage')->with($noticeMessage); 
          return $resultRedirect;
       
    } 
}

