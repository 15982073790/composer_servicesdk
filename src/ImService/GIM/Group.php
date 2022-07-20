<?php

namespace Mrstock\Servicesdk\ImService\GIM;

use Mrstock\Servicesdk\ImService\GIM;

/**
 * 群组统一管理控制器
 */
class Group extends GIM
{
    const RESOURCE = 'group';

    public function __construct($client)
    {
        parent::__construct($client, self::RESOURCE);
    }

    /**
     * 建群、添加群成员
     * @param int $uid 建群人/群主id
     * @param string $name 群名称
     * @param array $members 群成员
     * @return object
     */
    public function create($body)
    {
        $response = $this->post($this->uri . '/create', $body);
        return $response;
    }

    /**
     * 解散群组
     * @param int $group_id 群id
     * @return object
     */
    public function dismiss($body)
    {
        $response = $this->put($this->uri . '/dismiss', $body);
        return $response;
    }
}