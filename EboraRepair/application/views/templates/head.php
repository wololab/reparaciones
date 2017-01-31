<!-- Cabecera para desarrollo con Bootstrap online -->

<!--
<!DOCTYPE html >
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Eduardo Reneo"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>

    <title>Mi proyecto web</title>
</head>
<body onload="<?= (isset($head['onload']) ? $head['onload'] : '') ?>">
-->

<!-- ----------------------------------------------------------------------------------------- -->

<!-- Cabecera para desarrollo con Bootstrap offline -->


<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Eduardo Reneo"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

	<script src="<?= base_url() ?>assets/js/jquery.min.js">
	</script>

	<script src="<?= base_url() ?>assets/js/bootstrap.min.js">
	</script>

	<title>Mi proyecto web</title>
</head>
<body onload="<?= (isset($head['onload']) ? $head['onload'] : '') ?>">
