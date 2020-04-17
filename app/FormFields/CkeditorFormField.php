<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class CkeditorFormField extends AbstractHandler
{
    protected $codename = 'ckeditor';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.ckeditor', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
