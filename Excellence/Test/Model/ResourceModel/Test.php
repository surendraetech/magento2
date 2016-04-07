<?php
namespace Excellence\Test\Model\ResourceModel;
class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('excellence_test_test','excellence_test_test_id');
    }
}
