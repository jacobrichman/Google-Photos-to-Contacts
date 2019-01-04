<?php

$code = $_GET['code'];

$fields = [
    'code' => $code,
    'client_id' => '31446335233-mv1gr3dj67t37ke2t57a1qsvhqfcs9ph.apps.googleusercontent.com',
    'client_secret' => 'hdriaIOzjJnxDS7rQvTaEBQK',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'https://contactphotos.app/redirect.php',  
];

$ch = curl_init('https://www.googleapis.com/oauth2/v4/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
$response = curl_exec($ch);
curl_close($ch);
print_r($response);
$response = json_decode($response, 1);

if($response['access_token']){
?>

<script>
localStorage.setItem('access_token', '<?php echo $response['access_token'];?>');
localStorage.setItem('refresh_token', '<?php echo $response['refresh_token'];?>');
window.close();
</script>

<?php } ?>