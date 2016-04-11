<?php

namespace Excellence\Test\Controller\Index;

class Post extends \Magento\Framework\App\Action\Action {

    /**
     * Show Contact Us page
     *
     * @return void
     */
    protected $request;

    public function __construct(\Magento\Framework\App\Action\Context $context, 
              \Excellence\Test\Model\TestFactory $testFactory,
            \Magento\Framework\Message\ManagerInterface $messageManager,
            \Magento\Framework\App\Request\Http $request) {
        
        $this->request = $request;
        $this->_testFactory = $testFactory;
        $this->_messageManager = $messageManager;

        parent::__construct($context);
    }

    public function execute() {
        $post = $this->request->getPostValue();
        $model =  $this->_testFactory->create();
        $model->setData($post);
        $model->save();
        $this->_redirect('*/test/');
        $this->messageManager->addSuccess(__('Your record successfully added'));
    }

}
