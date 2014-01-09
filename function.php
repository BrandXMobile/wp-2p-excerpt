//function that gets the first two paragraphs and displays them ( no img )
function custom_field_excerpt() {
    
    global $post;
    $text = apply_filters( 'the_content', $post->post_content );
    //var_dump( $text );
    if ( '' != $text ) {
		$text = preg_replace( '/(<img)(.*?)(src=")(.*?)(.jpg")(.*?)>?/i', '', $text );
		
        $start = strpos( $text, '<p' ); // Locate the first paragraph tag
        
        $start_1 = strpos( $text, '</p>', $start ); // Locate the first paragraph closing tag
        
        $start_2 = strpos( $text, '<p', $start_1 ); // Locate the first paragraph tag
        
        $end = strpos($text, '</p>', $start_2); // Locate the first paragraph closing tag
		
		
        $text = substr( $text, $start, $end-$start+3); // Trim off everything after the closing paragraph tag
        $text = strip_shortcodes( $text );
        
        //$text = apply_filters( 'the_content', $text );

    }
    return $text;
}