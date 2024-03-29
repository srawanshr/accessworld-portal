<?php

namespace opensrs\backwardcompatibility\dataconversion\trust;

use opensrs\backwardcompatibility\dataconversion\DataConversion;

class SWRegister extends DataConversion
{
    // New structure for API calls handled by
    // the toolkit.
    //
    // index: field name
    // value: location of data to map to this
    //		  field from the original structure
    //
    // example 1:
    //    "cookie" => 'data->cookie'
    //	this will map ->data->cookie in the
    //	original object to ->cookie in the
    //  new format
    //
    // example 2:
    //	  ['attributes']['domain'] = 'data->domain'
    //  this will map ->data->domain in the original
    //  to ->attributes->domain in the new format
    protected $newStructure = array(
        'attributes' => array(
            'reg_type' => 'data->reg_type',
            'product_type' => 'data->product_type',
            'special_instructions' => 'data->special_instructions',
            'seal_in_search' => 'data->seal_in_search',
            'trust_seal' => 'data->trust_seal',
            'period' => 'data->period',
            'approver_email' => 'data->approver_email',
            'domain' => 'data->domain',
            'csr' => 'data->csr',
            'server_count' => 'data->server_count',
            'server_type' => 'data->server_type',
            'handle' => 'data->handle',

            'contact_set' => array(
                'organization' => 'organization',
                'admin' => 'admin',
                'billing' => 'billing',
                'tech' => 'tech',
                'signer' => 'signer',
                ),
            ),
        );

    public function convertDataObject($dataObject, $newStructure = null)
    {
        $p = new parent();

        if (is_null($newStructure)) {
            $newStructure = $this->newStructure;
        }

        $newDataObject = $p->convertDataObject($dataObject, $newStructure);

        return $newDataObject;
    }
}
