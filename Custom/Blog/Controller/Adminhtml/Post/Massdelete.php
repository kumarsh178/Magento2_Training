<?php

namespace Custom\Blog\Controller\Adminhtml\Post;

use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Custom\Blog\Model\ResourceModel\Post\CollectionFactory;
use Custom\Blog\Model\PostFactory;

class Massdelete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $postFactory;

	public $collectionFactory;

    public $filter;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
	 	Filter $filter,
        CollectionFactory $collectionFactory,
        PostFactory $postFactory
	)
	{
		parent::__construct($context);
		$this->postFactory = $postFactory;
	 	$this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{  
	    $ids=$this->getRequest()->getParams();
	    //echo "<pre>";
	    //print_r($ids); exit;
		 try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());
            $count = 0;

            // With Mass Action Filter Class
            
            foreach ($collection as $model) {
                $model = $this->postFactory->create()->load($model->getId());
                $model->delete();
                $count++;
            }

            //Without Mass Action Filter Class
             /*foreach ($ids['selected'] as $id) {
                $model = $this->postFactory->create()->load($id);
                $model->delete();
                $count++;
            } */

            $this->messageManager->addSuccess(__('A total of %1 blog(s) have been deleted.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
	}


}