<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $seo['title'] ?></title>

	<link rel="icon" href="<?= url( 'img/icon.png' ) ?>">
	<link rel="apple-touch-icon" href="<?= url( 'img/icon.png' ) ?>">
	<meta name="msapplication-TileImage" content="<?= url( 'img/icon.png' ) ?>">

	<link rel="canonical" href="<?= $seo['canonical'] ?>">
	<meta name="description" content="<?= $seo['description'] ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?= $seo['title'] ?>">
	<meta property="og:description" content="<?= $seo['description'] ?>">
	<meta property="og:url" content="<?= $seo['canonical'] ?>">
	<meta property="og:locale" content="en">
	<meta name="twitter:card" content="summary_large_image">
	<meta property="og:image" content="<?= url( 'img/image.jpg' ) ?>">
	<meta name="twitter:image" content="<?= url( 'img/image.jpg' ) ?>">

	<meta name="robots" content="max-image-preview:large, max-snippet:-1, max-video-preview:-1" />

	<link rel="stylesheet" href="<?= asset( 'css/style.css' ) ?>">
</head>
<body>