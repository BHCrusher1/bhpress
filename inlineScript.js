jQuery( function( $ ) {
	$( '.entry-content table' ).addClass( 'table' );
	$( '.more-link, .read-more' ).addClass( 'btn btn-info my-3' );
	$( '.cat-links a' ).addClass( 'text-white' );
	$( '#secondary section' ).addClass( 'mb-3' );
	$( '#secondary section ul' ).addClass( 'list-group list-group-flush p-0' );
	$( '#secondary section li' ).addClass( 'list-group-item' );
	$( 'ul.page-numbers' ).addClass( 'pagination mb-0' );
	$( 'ul.page-numbers li' ).addClass( 'px-3' );
	$( '#comments .form-submit #submit' ).addClass( 'btn btn-outline-primary' );
	$( '#comments input[type="text"], #comments input[type="email"], #comments input[type="url"], #comments textarea' ).addClass( 'form-control' );

	// https://qiita.com/Takuya_Kouyama/items/b815eb5e1f85d819b4d8
	// 要jQuery slim版不可
	// #で始まるアンカーをクリックした場合に処理
	$( 'a[href^="#"]' ).click( function() {
		var speed = 400;
		var href = $( this ).attr( 'href' );
		var target = $( href == '#' || href == '' ? 'html' : href );
		var position = target.offset().top;
		$( 'body,html' ).animate( { scrollTop: position }, speed, 'swing' );
		return false;
	} );
} );
