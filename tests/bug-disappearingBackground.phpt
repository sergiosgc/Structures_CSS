--TEST--
Bug regression guard: Disappearing background properties on CSS::expandShorthand
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.disappearingBackground.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(285) "#content,
#header
{
 width: 975px
}
#headerimg
{
 width: 18px;
 height: 63px;
 background-color: transparent;
 background-image: url("http://amadeo.blog.sergio/repository/44295/1557230.png");
 background-repeat: repeat;
 background-attachment: scroll;
 background-position: top left
}
"
