<?php

function addContact($contact)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'http://crm.citrusfit.ru/crm/api/add-contact');

    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);

    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($contact));
    $out = curl_exec($curl);

    curl_close($curl);

    return $out;
}

function addLead($lead)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, 'http://crm.citrusfit.ru/crm/api/add-lead');

    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);

    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($lead));
    $out = curl_exec($curl);

    curl_close($curl);

    return $out;
}

$status_request = '1';

// $dump = array(
//     'fio' => 'Тестовая',
//     'phone' => '+7906134395',
//     // 'email' => 'pekidoch@gmail.com',
//     'description' => 'Заявка с лендинга test.citrusfit.ru',
// );


$amocrm_user = '4';

$contact =  array(
    'name' => $dump['name'],
    'phone' => $dump['phone'],
    'email' => $dump['email'],
    'main_user_id' => $amocrm_user,
    'status_request' => $status_request,
);

$result = addContact($contact);
$contact_result = json_decode($result, true);

if ($contact_result['status'] == 'success') {
    $contact_id = $contact_result['id'];

    if (empty($contact_id)) {
        $contact_id = false;
    }

    $lead = array(
        'name' => strip_tags($dump['description']) . ' (' . date('Y-m-d H:i:s') . ')',
        'status_id' => $status_request,
        'linked_contact' => $contact_id,
        'main_user_id' => $amocrm_user,
    );

    $result = addLead($lead);
    $lead_result = json_decode($result, true);
} else {

}


