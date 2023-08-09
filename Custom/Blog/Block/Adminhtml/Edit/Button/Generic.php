<?php

namespace Custom\Blog\Block\Adminhtml\Edit\Button;

use Magento\Backend\Block\Widget\Context;

class Generic
{
    protected $context;
    protected $pageRepository;

    public function __construct(
        Context $context
    ) {
        $this->context = $context;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
