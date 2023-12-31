<?php
$breadcrumbs = [];
if ( ! empty( $schema['breadcrumbs'] ) ) {
	$links = $schema['breadcrumbs'];
	$list  = [];
	foreach ( $links as $i => $link ) {
		$list[] = [
			'@type'    => 'ListItem',
			'position' => ( $i + 1 ),
			'name'     => $link['text'],
			'item'     => $link['url'],
		];
	}

	$breadcrumbs = [
		'@type'           => 'BreadcrumbList',
		'name'            => 'Breadcrumbs',
		'@id'             => $seo['canonical'] . '#breadcrumbs',
		'itemListElement' => $list,
	];
}
?>

<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@graph": [
		{
			"@type": "WebSite",
			"@id": "<?= url() ?>/#website",
			"url": "<?= url() ?>",
			"name": "<?= config( 'site.title' ) ?>",
			"publisher": "<?= config( 'site.title' ) ?>",
			"description": "Xem lịch âm, lịch dương hôm nay",
			"inLanguage": "vi",
			"keywords": "lịch âm, âm lịch, lịch âm dương, lịch dương, dương lịch, lịch vạn niên, lịch vạn sự, xem lịch, tra cứu ngày âm, tra cứu lịch âm"
		},
		{
			"@type": "WebPage",
			"@id": "<?= $seo['canonical'] ?>#webpage",
			"url": "<?= $seo['canonical'] ?>",
			"inLanguage": "vi",
			"name": "<?= $schema['title'] ?>",
			"description": "<?= $seo['description'] ?>",
			"isPartOf": {
				"@id": "<?= url() ?>/#website"
			},
			<?php if ( $breadcrumbs ) : ?>
				"breadcrumb": {
					"@id": "<?= $seo['canonical'] ?>#breadcrumbs"
				},
			<?php endif ?>
			"publisher": "<?= config( 'site.title' ) ?>",
			"primaryImageOfPage": {
				"@id": "<?= url() ?>/#image"
			}
		},
		<?php if ( $breadcrumbs ) : ?>
			<?php echo json_encode( $breadcrumbs, JSON_PRETTY_PRINT ) ?>,
		<?php endif ?>
		{
			"@type": "ImageObject",
			"@id": "<?= url() ?>/#image",
			"caption": "<?= config( 'site.title' ) ?>",
			"url": "<?= url( 'assets/image.jpg' ) ?>",
			"width": 1200,
			"height": 630
		}
	]
}
</script>
</body>
</html>



