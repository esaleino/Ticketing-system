<?php
$validation_path = __DIR__;
include __DIR__ . "/validation_rules.php";
function reg_validation($data)
{
    // access the global variable $registerRules which is defined in validation_rules.php
    global $registerRules;
    // $errors is an associative array that will contain the errors for each field
    $errors = [];
    // iterate through the rules for each field 
    foreach ($registerRules as $key => $value)
    {
        // if the field is set in the data array, validate it
        if (isset($data[$key]))
        {
            // set the value of the field in the rules array to the value of the field in the data array
            $value['value'] = $data[$key];
            // validate the field and store the errors in the errors array
            $errors[$key] = validate($value, $key);
        }
    }
    if (isset($data['pass']) && isset($data['cpass']) && $data['pass'] !== $data['cpass'])
    {
        $errors['cpass'] = "Password and Confirm Password must match";
    }
    return $errors;
}
function validate($data, $key)
{
    $errors = [];
    if ($data['required'] && empty($data['value']))
    {
        $errors[] = $data['name'] . " is required";
    }
    if (isset($data['minlength']) && strlen($data['value']) < $data['minlength'])
    {
        $errors[] = $data['name'] . " must be at least " . $data['minlength'] . " characters long";
    }
    if (isset($data['maxlength']) && strlen($data['value']) > $data['maxlength'])
    {
        $errors[] = $data['name'] . " must be at most " . $data['maxlength'] . " characters long";
    }
    if (isset($data['regex']))
    {
        foreach ($data['regex'] as $key => $value)
        {
            if (!preg_match($value, $data['value']))
            {
                $errors[] = $data['name'] . " is not valid";
            }
        }
    }
    return $errors;
}
?>