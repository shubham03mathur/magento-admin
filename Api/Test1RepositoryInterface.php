<?php
namespace Excellence\Table\Api;

use Excellence\Table\Model\Test1Interface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface Test1RepositoryInterface 
{
    public function save(Test1Interface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(Test1Interface $page);

    public function deleteById($id);
}
