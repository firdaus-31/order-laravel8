<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  @if($userinfo)
  <h1>IP: {{$userinfo->ip}}</h1>
  <h1>IP: {{$userinfo->countryName}}</h1>
  <h1>IP: {{$userinfo->countryCode}}</h1>
  <h1>IP: {{$userinfo->regionCode}}</h1>
  <h1>IP: {{$userinfo->cityName}}</h1>
  <h1>IP: {{$userinfo->zipCode}}</h1>
  <h1>IP: {{$userinfo->latitude}}</h1>
  <h1>IP: {{$userinfo->longitude}}</h1>
  @endif
</body>

</html>