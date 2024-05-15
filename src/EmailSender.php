<?php

namespace Myitedu\EmailServices;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Myitedu\EmailServices\FormData;
use Illuminate\Support\Facades\Log;

class EmailSender
{
    public function acceptForm($data)
    {
        $uuid = (string) \Str::uuid();
        $formId = $data['form_id'];
        foreach ($data as $field_name => $field_value) {
            $fieldValidator = Validator::make(
                ['field_name' => $field_name, 'field_value' => $field_value],
                [
                    'field_name' => 'required|string|max:255',
                    'field_value' => 'required|string',
                ]
            );
            if ($fieldValidator->fails()) {
                return "AAAAAA";
            }
            $formData = new FormData();
            $formData->uuid = $uuid;
            $formData->form_id = $formId;
            $formData->field_name = $field_name;
            $formData->field_value = $field_value;
            $formData->save();
        }
        $result = dispatch(new SendEmailJob($uuid));
        return response()->json($result, 200);
    }
}
