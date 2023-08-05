<?php

namespace Custom\Blog\Ui\Component\Listing\Blog\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Action extends Column
{
    /** Url path */
    const ROW_EDIT_URL = 'customblog/post/newpost';
     /** Url path */
    const ROW_DELETE_URL = 'customblog/post/deletepost';
    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    private $_editUrl;

    /**
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     * @param string             $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['post_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            $this->_editUrl,
                            ['id' => $item['post_id']]
                        ),
                        'label' => __('Edit'),
                    ];
                     $item[$name]['delete'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            self::ROW_DELETE_URL,
                            ['id' => $item['post_id']]
                        ),
                        'label' => __('Delete'),
                    ];
                }
            }
        }

        return $dataSource;
    }
}