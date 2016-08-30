<?php
error_reporting(0); 
require_once('_params.php');
//include('yametrika.php');
/**
 * [sendEmail description]
 * @param  [type] $from    [description]
 * @param  [type] $to      [description]
 * @param  [type] $subject [description]
 * @param  [type] $message [description]
 * @return [type]          [description]
 */

$to[] .= $_POST['email'];


function sendEmail($from, $to, $subject, $message, $headers)
{
    if (is_array($to)) {
        $to = implode(',', $to);
    }


    return mail($to, $subject, $message, $headers);
}

$message = '';
if ( (isset($_POST)) && (!empty($_POST)) ) {


    $subject = 'Поступила заявка с лендинга '.$site;
    
    $dump = array(
        'name' => '[не указано]',
        'phone' => false,
        'email' => false,
        'description' => $subject,
    );
    $dump2 = array();
    


    if (isset($_POST['name']) && (!empty($_POST['name']))) {
        $dump['name'] = $_POST['name'];
    }

    if (isset($_POST['phone']) && (!empty($_POST['phone']))) {
        $dump['phone'] = $_POST['phone'];
    }
    
    if (isset($_POST['email']) && (!empty($_POST['email']))) {
        $dump['email'] = $_POST['email'];
    }
    
    if (isset($_POST['form_item']) && !empty($_POST['form_item'])) {
        $dump2['form_item'] = $_POST['form_item'];
    }
    
    
    if (isset($_POST['form']) && !empty($_POST['form'])) {
        $dump2['form'] = $_POST['form'];
    }


    $message .= 'Поступила заявка с лендинга '.$site.':<br><br>';
    
    
    foreach ($dump as $key => $value) {
            $message .= '<b>' . htmlspecialchars($key) . ':</b> ' . htmlspecialchars($value) . '<br>';
    }
    $message .= '<br>';
    foreach ($dump2 as $key => $value) {
            $message .= '<b>' . htmlspecialchars($key) . ':</b> ' . htmlspecialchars($value).'<br>';
    }
    $message .= '<br>';
    if(isset($_POST['item']) && !empty($_POST['item'])){
        $array = json_decode(str_replace("'",'"', $_POST['item']));//прием утм мето из формы.
        foreach($array as $key => $value){
            $message .= '<b>' . htmlspecialchars($key) . ':</b> ' . htmlspecialchars($value) . '<br>';// запись меток в сообщение
        }
    }
    require_once('mailcontent.php');

    if (sendEmail($from, $to, $subject, $message, $headers)) {
        try {
            require_once('crm.php');
        } catch (Exception $e) {

        }
        
        if(class_exists('YaMetrika')){

            
            $counter = new YaMetrika($metrika_id); // Номер счётчика Метрики
            $counter->hit(); // Вызов метода необходим для корректной привязки цели к визиту
//            $counter->reachGoal('FORM_SUBMIT');
        }
        $mass = ['data' => 'mail_send'];
        echo json_encode($mass);
        die();
    } else {
        $mass = ['data' => 'mail_not_send'];
        echo json_encode($mass);
        die();
    }
} else {
    header('Location: http://' . $site);
}

die();


?>