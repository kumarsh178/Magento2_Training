<?php
namespace Custom\Blog\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Custom\Blog\Model\ResourceModel\Post');
	}
}
