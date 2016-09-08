<?php

namespace opensrs\domains\forwarding;

use opensrs\Base;
use opensrs\Exception;

class ForwardingSet extends Base
{
    public $action = 'set_domain_forwarding';
    public $object = 'domain';

    public $_formatHolder = '';
    public $resultFullRaw;
    public $resultRaw;
    public $resultFullFormatted;
    public $resultFormatted;

    public $requiredFields = array(
        'attributes' => array(
            'subdomain',
            ),
        );

    public function __construct($formatString, $dataObject, $returnFullResponse = true)
    {
        parent::__construct();

        $this->_formatHolder = $formatString;

        $this->_validateObject($dataObject);

        $this->send($dataObject, $returnFullResponse);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    // Validate the object
    public function _validateObject($dataObject, $requiredFields = null)
    {
        if (
            (!isset($dataObject->cookie) || !$dataObject->cookie) &&
            (!isset($dataObject->attributes->domain) || !$dataObject->attributes->domain)
        ) {
            Exception::notDefined('cookie or domain');
        }
        if (
            isset($dataObject->cookie) &&
            isset($dataObject->attributes->domain) &&
            $dataObject->cookie &&
            $dataObject->attributes->domain
        ) {
            Exception::cannotSetOneCall('cookie and domain');
        }

        $parent = new parent();

        $parent->_validateObject($dataObject, $this->requiredFields);
    }
}
