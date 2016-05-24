<?php

namespace Excellence\Table\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

/**
 * Class ProductActions
 */
class PageAction extends Column
{
    protected $urlBuilder;
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['excellence_table_test_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            'excellence1/index/edit', 
                            ['id' => $item['excellence_table_test_id']]
                        ),
                        'label' => __('Edit'),
                    ];
                }
            }
        }
 
        return $dataSource;
    }
}
