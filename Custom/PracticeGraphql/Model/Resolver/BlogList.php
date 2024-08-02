<?php

declare(strict_types=1);

namespace Custom\PracticeGraphql\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Custom\Blog\Model\ResourceModel\Post\CollectionFactory;

/**
 * Class BlogDetails
 */
class BlogList implements ResolverInterface
{

    /**
     * PostFactory
     *
     * @var $postFactory
     */
    private $collectionFactory;


    /**
     * Constructor
     *
     * @param PostFactory $postFactory PostFactory.
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;

    }//end __construct()


     /**
      * Resolve Function
      *
      * @param Field       $field   Field.
      * @param Context     $context Context.
      * @param ResolveInfo $info    ResolveInfo.
      * @param array       $value   Array.
      * @param array       $args    Array.
      *
      * @throws GraphQlInputException GraphQlInputException.
      * @throws GraphQlNoSuchEntityException GraphQlNoSuchEntityException.
      *
      * @return array
      */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value=null,
        array $args=null
    ) {

        $postsData = [];
        $postData = $this->collectionFactory->create()->getData();
        return $postData;

    }//end resolve()


}//end class