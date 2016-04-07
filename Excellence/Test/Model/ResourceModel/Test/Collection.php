<?php
namespace Excellence\Test\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Excellence\Test\Model\Test','Excellence\Test\Model\ResourceModel\Test');
    }
}
