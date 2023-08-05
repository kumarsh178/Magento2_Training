<?php

declare(strict_types=1);

namespace Custom\PracticeGraphql\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Custom\Blog\Model\PostFactory;

/**
 * Class BlogDetails
 */
class CreatePost implements ResolverInterface
{

    /**
     * PostFactory
     *
     * @var $postFactory
     */
    private $postFactory;


    /**
     * Constructor
     *
     * @param PostFactory $postFactory PostFactory.
     */
    public function __construct(
        PostFactory $postFactory
    ) {
        $this->postFactory = $postFactory;

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
       
        $formData         = $args['input'];
        $post = $this->postFactory->create();
        $post->setData($formData);
        $post->save();
        $data=array("message"=>"Post Created Successfully");
        return $data;

    }//end resolve()


}//end class