<?php

$code = $_GET['code'];

$fields = [
    'code' => $code,
    'client_id' => '1093367940800-n0pclmhlhpe9on7cn40vdfdhfsckisiq.apps.googleusercontent.com',
    'client_secret' => 'mW7tdkKZPD-4Woxs3fS2Z2vP',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'https://contactphotos.app',  
];

$ch = curl_init('https://www.googleapis.com/oauth2/v4/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
$response = curl_exec($ch);
curl_close($ch);
print_r($response);

if($response['access_token']){
?>

<script>
localStorage.setItem('access_token', '<?php echo $response['access_token'];?>');
localStorage.setItem('refresh_token', '<?php echo $response['refresh_token'];?>');
//window.close();
</script>

<?php } ?>