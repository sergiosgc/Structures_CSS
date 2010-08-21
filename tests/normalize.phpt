--TEST--
Normalize large CSS
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/blog.com.css');

include('include/parse.php');

$parser->result->normalize();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(33837) "a
{
 color: rgb(93, 179, 203)
}
body
{
 border: 0px;
 color: rgb(153, 153, 153);
 text-align: center;
 background: rgb(255, 255, 255) url("/images/internal.bg.png") repeat-x scroll top left;
 margin: 0px;
 padding: 85px 0px 0px
}
h1
{
 height: 35px;
 width: 766px;
 color: rgb(51, 102, 153);
 font-size: 25px;
 text-align: left;
 background: transparent url("/images/navh2.png") repeat scroll 0% 0%;
 margin: 5px 0 0px;
 padding: 7px 0 0 12px
}
li
{
 color: grey
}
strong
{
 color: rgb(18, 150, 182)
}
.albumtitle
{
 color: rgb(255, 255, 255);
 width: 400px;
 height: 98px;
 position: relative;
 background: transparent url("/images/albumtitle.bg.png") no-repeat scroll top left;
 padding: 14px 0px 0px 18px
}
.albumtitle-album
{
 position: absolute;
 top: 70px;
 left: 20px;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.5;
 font-family: Arial,sans-serif
}
.albumtitle-photocount
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 11px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 position: absolute;
 top: 86px;
 left: 340px
}
.albumtitle-tagsearch
{
 display: none;
 position: absolute;
 left: 338px;
 top: 14px
}
.albumtitle-type
{
 font-style: normal;
 font-variant: normal;
 font-weight: bold;
 font-size: 14px;
 line-height: 1;
 font-family: Arial,sans-serif;
 display: block;
 position: absolute;
 top: 16px;
 left: 18px
}
.country-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 background: rgb(255, 255, 255) url("/images/countries/country.png") no-repeat scroll top left;
 margin: 5px;
 padding: 10px 0px 67px 172px
}
.country-header-cn
{
 background: transparent url("/images/countries/cn.p.png") repeat scroll 0% 0%
}
.country-header-de
{
 background: transparent url("/images/countries/de.p.png") repeat scroll 0% 0%
}
.country-header-dk
{
 background: transparent url("/images/countries/dk.p.png") repeat scroll 0% 0%
}
.country-header-fr
{
 background: transparent url("/images/countries/fr.p.png") repeat scroll 0% 0%
}
.country-header-gr
{
 background: transparent url("/images/countries/gr.p.png") repeat scroll 0% 0%
}
.country-header-hu
{
 background: transparent url("/images/countries/hu.p.png") repeat scroll 0% 0%
}
.country-header-id
{
 background: transparent url("/images/countries/id.p.png") repeat scroll 0% 0%
}
.country-header-it
{
 background: transparent url("/images/countries/it.p.png") repeat scroll 0% 0%
}
.country-header-nl
{
 background: transparent url("/images/countries/nl.p.png") repeat scroll 0% 0%
}
.country-header-pl
{
 background: transparent url("/images/countries/pl.p.png") repeat scroll 0% 0%
}
.country-header-pt
{
 background: transparent url("/images/countries/pt.p.png") repeat scroll 0% 0%
}
.country-header-ro
{
 background: transparent url("/images/countries/ro.p.png") repeat scroll 0% 0%
}
.country-header-ru
{
 background: transparent url("/images/countries/ru.p.png") repeat scroll 0% 0%
}
.country-header-uk
{
 background: transparent url("/images/countries/uk.p.png") repeat scroll 0% 0%
}
.faces-foto,
.framed-foto
{
 height: 125px;
 width: 127px;
 background: transparent url("/images/frame.png") no-repeat scroll 0% 0%;
 padding: 17px 0 17px 17px
}
.greenbox
{
 width: 299px;
 color: rgb(255, 255, 255);
 position: relative;
 background: rgb(130, 222, 39) url("/images/greenbox.bottom.png") no-repeat scroll bottom left;
 margin: 0px 0px 20px;
 padding: 41px 0px 21px
}
.greenbox-title
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 18px;
 line-height: 1.5;
 font-family: Arial,sans-serif;
 position: absolute;
 top: 0px;
 left: 0px;
 width: 299px;
 text-align: center;
 background: rgb(130, 222, 39) url("/images/greenbox.top.png") no-repeat scroll top left;
 margin: 0px;
 padding: 4px 0px 0px
}
.imagepick
{
 padding: 20px 0
}
.large-framed-foto
{
 display: block;
 background: transparent url("/images/largeframe.middle.png") repeat-y scroll top left;
 padding: 0px 13px
}
.large-framed-foto-bottom
{
 width: 347px;
 background: rgb(0, 128, 0) url("/images/largeframe.bottom.png") no-repeat scroll bottom left;
 margin: 0px;
 padding: 0px 0px 14px
}
.large-framed-foto-top
{
 width: 347px;
 background: rgb(255, 0, 0) url("/images/largeframe.top.png") no-repeat scroll top left;
 margin: 0px;
 padding: 14px 0px 0px
}
.logo
{
 border: 0px;
 position: absolute;
 z-index: -10px;
 top: 410px;
 right: 395px;
 color: rgb(255, 255, 255);
 margin: 0 10px 0 0
}
.paginator-current-page
{
 border: 1px solid rgb(114, 194, 221);
 color: rgb(255, 255, 255);
 background: rgb(114, 194, 221) none repeat scroll 0% 0%
}
.paginator-page
{
 border: 1px solid rgb(229, 229, 229);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 color: rgb(114, 194, 221);
 padding: 0 5px
}
.paginator-pages
{
 color: rgb(10, 134, 170);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 14px;
 line-height: 1;
 font-family: Arial,sans-serif
}
.paginator-pages-next
{
 line-height: 16px;
 vertical-align: middle;
 width: 100%;
 border-color: rgb(180, 214, 223) inherit inherit;
 border-style: solid inherit inherit;
 border-width: 1px inherit inherit;
 margin: 17px 0 0;
 padding: 17px 0 25px
}
.paginator-previousnext
{
 float: right;
 position: relative;
 top: -16px
}
.photo-creation,
.photo-description
{
 color: rgb(102, 102, 102);
 border-color: inherit inherit rgb(229, 229, 229);
 border-style: inherit inherit solid;
 border-width: inherit inherit 1px;
 padding: 10px 0px
}
.photo-properties
{
 color: rgb(102, 102, 102);
 font-style: normal;
 font-variant: normal;
 font-weight: bold;
 font-size: 14px;
 line-height: 1;
 font-family: Arial,sans-serif;
 border-color: inherit inherit rgb(229, 229, 229);
 border-style: inherit inherit solid;
 border-width: inherit inherit 1px;
 padding: 10px 20px
}
.photo-subtitle
{
 font-style: normal;
 font-variant: normal;
 font-weight: bold;
 font-size: 9px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 display: block;
 color: rgb(130, 222, 39);
 text-transform: lowercase
}
.photo-tags
{
 font-style: normal;
 font-variant: normal;
 font-weight: bold;
 font-size: 14px;
 line-height: 1;
 font-family: Arial,sans-serif;
 color: rgb(84, 171, 196)
}
.photo-tags-title
{
 color: rgb(10, 134, 170);
 display: block;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 18px;
 line-height: 1.5;
 font-family: Arial,sans-serif
}
.phototitle
{
 height: 52px;
 min-width: 400px;
 background: transparent url("/images/phototitle.bg.png") no-repeat scroll top left
}
.phototitle-td
{
 width: 400px
}
.phototitle-title
{
 color: rgb(255, 255, 255);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 18px;
 line-height: 1.5;
 font-family: Arial,sans-serif;
 margin: 0 0 0 20px
}
.phototitle-type
{
 color: rgb(130, 222, 39);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 10px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 margin: 0 0 0 20px;
 padding: 10px 0 0
}
.private-album-notice
{
 padding: 15px
}
.small-framed-foto
{
 border: 0px;
 display: block;
 width: 59px;
 background: transparent url("/images/smallframe.png") no-repeat scroll top center;
 margin: 0px;
 padding: 9px
}
.small-framed-foto-bottom
{
 width: 150px;
 background: rgb(0, 128, 0) url("/images/smallframe.bottom.png") no-repeat scroll bottom left;
 margin: 0px;
 padding: 0px 0px 14px
}
.small-framed-foto-middle
{
 display: block;
 text-decoration: none;
 background: transparent url("/images/smallframe.middle.png") repeat-y scroll top left;
 padding: 0px 13px
}
.small-framed-foto-top
{
 width: 150px;
 background: rgb(255, 0, 0) url("/images/smallframe.top.png") no-repeat scroll top left;
 margin: 0px;
 padding: 14px 0px 0px
}
.albumtitle a
{
 color: rgb(255, 255, 255)
}
.albumtitle-tagsearch label
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 display: block;
 margin: 0px;
 padding: 0px
}
.framed-foto img
{
 border: 1px solid rgb(0, 0, 0)
}
.greenbox a
{
 color: rgb(255, 255, 255)
}
.greenbox li
{
 display: inline;
 line-height: 20px;
 background: transparent url("/images/greenbox.bullet.png") no-repeat scroll center left;
 list-style: none outside none;
 margin: 0px;
 padding: 0px
}
.greenbox ul
{
 list-style: none outside none;
 margin: 0px;
 padding: 0px
}
.imagepick img,
.large-framed-foto img
{
 border: 0px
}
.paginator-current-page a
{
 color: rgb(255, 255, 255)
}
.paginator-page a
{
 color: rgb(114, 194, 221)
}
.paginator-pages a
{
 text-decoration: none
}
.photo-next a,
.photo-previous a
{
 color: rgb(71, 164, 191)
}
.photo-tags a
{
 color: rgb(84, 171, 196);
 text-decoration: none;
 background: rgb(229, 229, 229) none repeat scroll 0% 0%
}
.profile-page h2
{
 display: block;
 width: 525px;
 height: 57px;
 color: rgb(18, 150, 182);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 21px;
 line-height: 57px;
 font-family: serif;
 background: url("/images/h2.wide.png") no-repeat scroll top left;
 padding: 0 0 0 10px
}
.small-framed-foto img
{
 border: 0px
}
.tagcloud a
{
 text-decoration: none
}
a.large
{
 font-size: large
}
a.marvin-widget-dropdownlist-button
{
 border: 1px solid rgb(255, 255, 255);
 position: absolute;
 width: 100px;
 color: rgb(255, 255, 255) !important;
 text-decoration: none;
 text-align: left;
 white-space: nowrap;
 background: rgb(103, 191, 9) url("/images/select.png") no-repeat scroll top right;
 margin: 0px;
 padding: 4px 36px 3px 5px
}
a.max
{
 font-size: xx-large
}
a.medium
{
 font-size: medium
}
a.min
{
 font-size: xx-small
}
a.next
{
 float: right;
 padding: 0 50px 0 0
}
a.small
{
 font-size: small
}
body.fckeditor
{
 background: rgb(255, 255, 255) url("/images/fckeditor.bg.png") repeat-x scroll top left
}
body.photos
{
 padding: 124px 0 0
}
div.blog-feature
{
 background: url("/images/blog-feature.png") no-repeat scroll top left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 26px;
 line-height: 1;
 font-family: Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
div.frame
{
 width: 64px;
 height: 64px;
 background: transparent url("/images/photo-frame.png") repeat scroll 0% 0%;
 margin: 0 10px 0 0px
}
div.greenbutton
{
 width: 106px;
 height: 24px;
 text-align: center;
 text-transform: lowercase;
 color: rgb(255, 255, 255);
 background: transparent url("/images/button.green.gif") no-repeat scroll center center;
 margin: 0px auto
}
div.next
{
 float: right
}
div.nextbutton
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 2;
 font-family: Arial,sans-serif;
 float: right;
 width: 133px;
 height: 24px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px
}
div.photo-feature
{
 background: url("/images/photo-feature.png") no-repeat scroll top left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 26px;
 line-height: 1;
 font-family: Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
div.prevbutton
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 2;
 font-family: Arial,sans-serif;
 float: right;
 width: 133px;
 height: 24px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle;
 background: transparent url("/images/button.greenprevious.gif") no-repeat scroll top left;
 margin: 0px;
 padding: 7px 10px 6px 23px
}
div.preview
{
 text-align: center;
 width: 105px;
 height: 105px;
 padding: 5px 0 0
}
div.previous
{
 float: left
}
div.pricing-support
{
 background: url("/images/pricing-support.png") no-repeat scroll top left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 26px;
 line-height: 1;
 font-family: Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
img.profile-photos-verysmall
{
 border: none;
 height: 54px;
 width: 54px;
 background: transparent url("/images/photo-frame.png") repeat scroll 0% 0%;
 margin: 0 10px 10px 0;
 padding: 5px
}
img.profileimage-verysmall
{
 border: none;
 height: 54px;
 width: 54px;
 padding: 5px 0 0 5px
}
img.thumbnail
{
 border: 2px solid rgb(93, 179, 203) !important
}
label.preview
{
 font-size: 14px;
 font-weight: bold;
 color: grey;
 text-transform: uppercase;
 word-spacing: 30px
}
li.bullet
{
 background: url("/images/profile-bullet.png") no-repeat
}
li.directory-list-current
{
 position: relative;
 left: -18px;
 background: transparent url("/images/currentDir.png") no-repeat scroll center left
}
span.green
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 18px;
 font-family: serif;
 color: rgb(138, 199, 82)
}
span.marvin-widget-dropdownlist
{
 position: relative
}
table.data
{
 width: 100%
}
table.layout
{
 border: 0px solid rgb(0, 128, 0);
 width: 100%
}
td.col-right
{
 border-color: inherit inherit inherit rgb(255, 255, 255);
 border-style: inherit inherit inherit solid;
 border-width: inherit inherit inherit 35px
}
td.photo-next,
td.photo-previous
{
 border-color: inherit inherit rgb(229, 229, 229);
 border-style: inherit inherit solid;
 border-width: inherit inherit 1px;
 padding: 20px 0
}
td.title
{
 vertical-align: top;
 padding: 10px 0 0
}
ul.directory-list-directories
{
 list-style: none outside none;
 margin: 0px;
 padding: 0px 0px 0px 10px
}
ul.marvin-widget-dropdownlist-list
{
 position: absolute;
 width: 136px;
 left: 0px;
 top: 8px;
 background: rgb(103, 191, 9) none repeat scroll 0% 0%;
 border-color: rgb(255, 255, 255);
 border-style: solid;
 border-width: 0px 1px 1px;
 list-style: none outside none;
 margin: 0px;
 padding: 5px 0px 5px 5px
}
li.directory-list-current a
{
 padding: 0 0 0 18px
}
table td.dota
{
 background: url("/images/dota.png") no-repeat center center
}
table td.dotb
{
 background: url("/images/dotb.png") no-repeat center center
}
table.data td
{
 text-align: center
}
table.data th
{
 color: rgb(255, 255, 255);
 background: rgb(51, 102, 153) none repeat scroll 0% 0%
}
table.layout td
{
 vertical-align: top
}
ul.directory-list-directories li
{
 margin: 0px;
 padding: 0px
}
ul.marvin-widget-dropdownlist-list li
{
 white-space: nowrap;
 margin: 4px 0px;
 padding: 0px 5px 0px 0px
}
ul.marvin-widget-dropdownlist-list li a
{
 border: 0px solid rgb(255, 255, 255);
 color: rgb(255, 255, 255) !important
}
.customizeblogheaderzoom .imagepick,
.customizeblogzoom .imagepick
{
 background: transparent url("/images/zoom.bottom.gif") no-repeat scroll bottom left;
 padding: 0px 0px 10px
}
.profile-page .button
{
 border: 1px solid rgb(18, 150, 182);
 display: block;
 color: rgb(255, 255, 255);
 text-decoration: none;
 width: 150px;
 background: rgb(114, 194, 221) none repeat scroll 0% 0%;
 padding: 3px 10px
}
.albumtitle-tagsearch input.image
{
 position: absolute;
 top: 15px;
 left: 190px;
 margin: 0px;
 padding: 0px
}
.albumtitle-tagsearch input.text
{
 border: 1px solid rgb(88, 140, 154);
 position: absolute;
 top: 16px;
 left: 0px;
 width: 183px;
 height: 22px;
 line-height: 22px;
 vertical-align: middle
}
.imagepick div.white
{
 background: transparent url("/images/imagepick.bottom.gif") no-repeat bottom left;
 width: 187px;
 height: 100%;
 text-align: center;
 overflow: hidden;
 margin: 0px;
 padding: 0px 0px 35px
}
.profile-page h2.small
{
 width: 205px;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 20px;
 line-height: 57px;
 font-family: serif;
 background: url("/images/h2.wide-small.png") no-repeat scroll top left
}
.success div.whiterounded
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 13px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 width: 434px;
 text-align: left;
 background: rgb(255, 255, 255) url("/images/whiterounded-success.top.png") no-repeat scroll top right;
 margin: 0px 0px 0px auto;
 padding: 20px
}
.success div.whiterounded-bottom
{
 width: 474px;
 height: 18px;
 background: transparent url("/images/whiterounded-success.bottom.gif") no-repeat scroll top right;
 margin: 0px 0px 0px auto
}
.success input.submit
{
 position: absolute;
 top: 142px;
 left: 440px;
 background: transparent url("/images/button-success.greennext.gif") no-repeat scroll bottom left;
 margin: 0px 0px 0px auto
}
.tagcloud a:hover
{
 text-decoration: underline
}
div.frame.top
{
 margin: 0 0 0 15px
}
div.preview.audio
{
 background: transparent url("/images/icons/audio.png") no-repeat scroll bottom right
}
div.preview.doc
{
 background: transparent url("/images/icons/doc.png") no-repeat scroll bottom right
}
div.preview.mp3
{
 background: transparent url("/images/icons/player.png") no-repeat center center
}
div.preview.ppt
{
 background: transparent url("/images/icons/ppt.png") no-repeat scroll bottom right
}
div.preview.swf
{
 background: transparent url("/images/icons/flash_small.jpg") no-repeat scroll bottom right
}
div.preview.video
{
 background: transparent url("/images/icons/play.jpg") no-repeat center center
}
div.preview.xls
{
 background: transparent url("/images/icons/xls.png") no-repeat scroll bottom right
}
img.preview.audio
{
 background: transparent url("/images/icons/audio.png") no-repeat scroll bottom right
}
img.preview.doc
{
 background: transparent url("/images/icons/doc.png") no-repeat scroll bottom right
}
img.preview.ppt
{
 background: transparent url("/images/icons/ppt.png") no-repeat scroll bottom right
}
img.preview.video
{
 background: transparent url("/images/icons/flash_small.jpg") no-repeat scroll bottom right
}
img.preview.xls
{
 background: transparent url("/images/icons/xls.png") no-repeat scroll bottom right
}
.success div.whiterounded p
{
 margin: 5px 0px 0px;
 padding: 0px
}
table.data td.feat
{
 text-align: left;
 width: 250px
}
table.data tr.even
{
 color: rgb(255, 255, 255);
 background: rgb(255, 255, 255) none repeat scroll 0% 0%
}
table.data tr.odd
{
 color: rgb(255, 255, 255);
 background: rgb(236, 246, 248) none repeat scroll 0% 0%
}
.customizeblogheaderzoom .imagepick .white,
.customizeblogzoom .imagepick .white
{
 width: 575px;
 background: rgb(255, 255, 255) url("/images/zoom.top.gif") no-repeat scroll top left;
 padding: 10px 13px 0px
}
.customizeblogheaderzoom .imagepick .white img,
.customizeblogzoom .imagepick .white img
{
 max-width: 575px;
 overflow: hidden
}
#actions
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 15px;
 line-height: 20px;
 font-family: serif;
 list-style: none outside none;
 margin: 20px 0 0
}
#album
{
 width: 400px
}
#faces
{
 text-align: left
}
#faces-foto
{
 height: 125px;
 width: 127px;
 background: transparent url("/images/frame.png") no-repeat scroll 0% 0%;
 padding: 17px 0 17px 17px
}
#faces-header
{
 height: 36px;
 width: 568px;
 font-size: 12px;
 text-align: left;
 color: rgb(89, 119, 126);
 background: transparent url("/images/manyfaces.png") repeat scroll 0% 0%;
 margin: 5px 0 0px;
 padding: 52px 0 0 172px
}
#happybirthday
{
 text-align: left
}
#happybirthday-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 background: rgb(255, 255, 255) url("/images/happy.png") no-repeat scroll top left;
 margin: 5px;
 padding: 52px 0px 25px 172px
}
#header
{
 position: absolute;
 height: 85px;
 width: 739px;
 top: 0px;
 text-decoration: none;
 background: rgb(114, 194, 221) url("/images/header.bg.png") no-repeat scroll top left;
 margin: 0 auto
}
#header-menu
{
 position: absolute;
 top: 0px;
 left: 439px;
 color: rgb(255, 255, 255);
 width: 300px;
 text-align: right
}
#language-header,
#photos-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 margin: 5px;
 padding: 10px 0px 67px 172px
}
#photos-header-title
{
 color: rgb(18, 150, 182);
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif
}
#profile-bottom
{
 height: 36px;
 width: 740px;
 background: url("/images/profile-bottom.png") no-repeat scroll top left;
 margin: 0 0 5px
}
#profile-header
{
 width: 740px;
 color: rgb(18, 150, 182);
 text-align: left;
 background: url("/images/profile-main.png") repeat scroll top left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 height: auto;
 border-width: 0px inherit inherit !important
}
#profile-title
{
 position: relative;
 display: inline
}
#profile-top
{
 height: 9px;
 width: 740px;
 background: url("/images/profile-top.png") no-repeat scroll top left;
 border-color: rgb(255, 255, 255) inherit inherit;
 border-style: solid inherit inherit;
 border-width: 10px inherit inherit
}
#slideshow
{
 width: 160px;
 height: 74px;
 margin: 0 0 270px 30px
}
#title
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 32px;
 line-height: 1.2;
 font-family: Arial,sans-serif
}
#updated-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 margin: 5px;
 padding: 10px 0px 67px 172px
}
#actions a
{
 text-decoration: none;
 margin: 0 0 50px 10px
}
#faces p
{
 font-size: 14px;
 padding: 0 0 0 0px
}
#faces table
{
 width: 400px
}
#faces-header h1
{
 display: none
}
#happybirthday h2
{
 font-size: 13px;
 text-align: left;
 color: rgb(18, 150, 182);
 height: 57px;
 width: 568px;
 background: transparent url("/images/happy_post.png") no-repeat scroll 0% 0%;
 margin: 0px 0 0 172px;
 padding: 5px 0 0 5px
}
#happybirthday img
{
 border: 0px;
 height: 115px;
 width: 115px;
 position: absolute;
 background: transparent url("/images/happybirthdayphoto.png") repeat scroll 0% 0%;
 margin: 0px;
 padding: 21px 17px 20px 16px
}
#happybirthday li
{
 font-size: 12px;
 text-align: left;
 list-style: none outside none
}
#happybirthday ul
{
 color: rgb(0, 0, 0);
 font-size: 13px;
 width: 495px;
 min-height: 100px;
 list-style: none outside none;
 margin: 0px 0px 0px 172px;
 padding: 0px
}
#happybirthday-header h1
{
 display: none
}
#header-menu li
{
 display: inline;
 background: transparent url("/images/header.menuseparator.png") no-repeat scroll bottom left;
 margin: 0px;
 padding: 0px
}
#header-menu ul
{
 list-style: none outside none
}
#photos-header h1
{
 display: none
}
div#body
{
 color: rgb(71, 101, 109);
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 min-height: 420px;
 text-align: left;
 background: rgb(181, 218, 229) url("/images/body.bg.png") no-repeat scroll top right;
 margin: 8px 0px 0px 78px;
 padding: 24px 30px
}
div#body-bottom
{
 height: 16px;
 background: transparent url("/images/body.bottom.png") no-repeat scroll top right;
 margin: 0px 0px 15px 78px;
 padding: 0px
}
div#breadcrumbs
{
 text-align: right;
 height: 50px
}
div#content
{
 width: 739px;
 text-align: left;
 margin: 0px auto
}
div#footer
{
 color: rgb(102, 102, 102);
 text-align: left;
 display: block;
 height: 13px;
 width: 739px;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 background: rgb(255, 255, 255) url("/images/footer.bg.png") no-repeat scroll top left;
 margin: 40px auto 0px;
 padding: 13px 0px
}
div#title
{
 line-height: 62px;
 color: rgb(255, 255, 255);
 text-align: left;
 background: transparent url("/images/title.bg.png") no-repeat scroll top right;
 padding: 0 0 0 95px
}
img#logo
{
 border: 0px;
 position: relative;
 top: -8px;
 height: 93px
}
ul#header-menu
{
 margin: 0px;
 padding: 0px
}
#header-menu li a
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 10px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 text-decoration: none;
 color: rgb(255, 255, 255);
 text-transform: uppercase
}
div#body a
{
 color: rgb(71, 101, 109)
}
div#body div,
div#body h2,
div#body h3,
div#body h4,
div#body h5,
div#body h6
{
 text-align: left
}
div#body td
{
 color: rgb(71, 101, 109)
}
div#body form td
{
 border: solid rgb(180, 214, 223);
 vertical-align: top;
 border-width: 1px 0px 0px
}
div#body td a
{
 color: rgb(71, 101, 109)
}
#happybirthday .cinzento
{
 color: rgb(120, 120, 120)
}
#happybirthday .verde
{
 color: rgb(114, 192, 39)
}
.createblog #header
{
 background: transparent url("/images/header.createblog.bg.png") no-repeat scroll top left
}
.createuser #header
{
 background: transparent url("/images/header.createuser.bg.png") no-repeat scroll top left
}
.customizeblog #header
{
 background: transparent url("/images/header.customizeblog.bg.png") no-repeat scroll top left
}
.fckeditor #header
{
 height: 25px;
 background: transparent none repeat scroll 0% 0%
}
.photos #header
{
 background: transparent url("/images/header.photos.bg.png") no-repeat scroll top left
}
.profile-page #detail
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 15px;
 line-height: 20px;
 font-family: serif;
 list-style: none outside none;
 margin: 0px;
 padding: 0 0 0 15px
}
.profile-page #friendlist
{
 margin: 0 0 0 15px
}
.success #body-bottom
{
 display: none
}
#header-menu li.first
{
 background: none none repeat scroll 0% 0%
}
.createblog div#title
{
 background: transparent url("/images/title.2.bg.png") repeat scroll 0% 0%
}
.createuser div#title
{
 background: transparent url("/images/title.1.bg.png") repeat scroll 0% 0%
}
.customizeblog div#body
{
 text-align: center
}
.customizeblog div#title
{
 background: transparent url("/images/title.3.bg.png") repeat scroll 0% 0%
}
.fckeditor div#body
{
 padding: 5px 0 0
}
.fckeditor div#breadcrumbs
{
 height: 10px
}
.success div#body
{
 min-height: 0px;
 height: 155px;
 text-align: right;
 position: relative;
 background: rgb(210, 233, 239) url("/images/body-success.bg.png") repeat scroll 0% 0%;
 margin: 0 0 18px
}
.success div#title
{
 background: transparent url("/images/title.s.bg.png") repeat scroll 0% 0%
}
div#body .greenbutton
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 12px;
 line-height: 2;
 font-family: Arial,sans-serif
}
div#breadcrumbs .step
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 14px;
 line-height: 1;
 font-family: Arial,sans-serif
}
#happybirthday h2.name a
{
 color: rgb(18, 150, 182);
 font-size: 18px;
 text-decoration: none
}
.customizeblog div#body div,
.customizeblog div#body h1,
.customizeblog div#body h2,
.customizeblog div#body h3,
.customizeblog div#body h4,
.customizeblog div#body h5,
.customizeblog div#body h6
{
 text-align: center
}
div#body input.submit
{
 border: 0px;
 display: block;
 width: 166px;
 height: 37px;
 color: rgb(255, 255, 255);
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 16px;
 line-height: 1.5;
 font-family: Arial,sans-serif;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll bottom left;
 margin: 0px;
 padding: 0px 0px 0px 13px
}
div#breadcrumbs .step img
{
 position: relative;
 top: 9px
}
div#breadcrumbs span.step
{
 color: rgb(10, 134, 170);
 vertical-align: middle;
 position: relative;
 top: -3px
}
div#body div.greenbutton a,
div#body div.nextbutton a,
div#body div.prevbutton a
{
 color: rgb(255, 255, 255);
 text-decoration: none
}
div#body form td.error
{
 color: rgb(201, 85, 52);
 background: transparent url("/images/form.error.bg.gif") no-repeat scroll top left;
 padding: 4px 4px 4px 15px
}
div#body form td.help
{
 text-align: left;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 11px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 background: transparent url("/images/form.help.bg.gif") no-repeat scroll top left;
 padding: 4px 4px 4px 15px
}
div#body form td.help-empty
{
 background: transparent none repeat scroll 0% 0%
}
div#body form td.input
{
 width: 260px;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 13px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 padding: 4px
}
div#body form td.label
{
 width: 132px;
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 13px;
 line-height: 1.2;
 font-family: Arial,sans-serif;
 padding: 4px
}
div#body form td.tags
{
 text-align: left;
 padding: 4px 4px 4px 15px
}
div#body form td.wideinput
{
 width: auto
}
div#body td a.selectedtag
{
 color: rgb(255, 0, 0)
}
div#body td.imagepick td
{
 width: 187px;
 background: transparent url("/images/imagepick.bottom.gif") no-repeat scroll bottom left;
 margin: 0px;
 padding: 0px 19px 35px 0px
}
div#body td.imagepick th
{
 border: 0px;
 width: 187px;
 background: transparent url("/images/imagepick.top.gif") no-repeat scroll top left;
 margin: 0px;
 padding: 13px 0px 0px
}
div#body form td.help p
{
 margin: 0 0 2em
}
div#body form td.input select
{
 width: 230px
}
div#body form td.input textarea
{
 height: 65px;
 width: 230px
}
.profile-page #friendlist .nickname
{
 text-align: center
}
.customizeblog div#body div.nextbutton
{
 float: right;
 width: 133px;
 height: 24px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px
}
.customizeblog div#body div.prevbutton
{
 float: right;
 width: 133px;
 height: 24px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle;
 background: transparent url("/images/button.greenprevious.gif") no-repeat scroll top left;
 margin: 0px;
 padding: 7px 10px 6px 23px
}
div#body form td.label .optional
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 10px;
 line-height: 1.4;
 font-family: Arial,sans-serif;
 display: block
}
div#body td.imagepick td.last
{
 padding: 0 0px 0 0
}
div#body td.imagepick th.empty
{
 background: transparent none repeat scroll 0% 0%
}
div#body td.imagepick th.last
{
 padding: 0 0px 0 0
}
div#body form td.input input.text
{
 width: 230px
}
#footer #footer-copyright
{
 float: left;
 margin: 0 0 0 14px
}
#footer #footer-menu
{
 float: right;
 margin: 0 15px 0 0
}
#header #header-banner
{
 border: 0px;
 position: absolute;
 top: 20px;
 left: 261px;
 height: 60px;
 width: 468px
}
#profile #browse-friends
{
 width: 495px;
 height: 550px;
 margin: 30px 0px 0px 275px
}
#profile #profile-comments
{
 width: 495px;
 height: 600px;
 margin: 30px 0px 0px 275px
}
#footer #footer-menu a
{
 color: rgb(102, 102, 102)
}
#header #header-banner iframe
{
 border-color: rgb(255, 255, 255);
 border-style: solid;
 border-width: 5px 5px 0px
}
#header a#header-home-link
{
 width: 235px;
 height: 85px;
 position: absolute;
 top: 0px;
 left: 0px
}
#profile #browse-friends h3
{
 font-size: 17px;
 margin: 0px 0px 15px
}
#profile #browse-friends td
{
 border: 2px solid rgb(51, 102, 153);
 text-align: center;
 width: 150px;
 height: 150px
}
#profile #profile-comments h3
{
 font-size: 17px;
 margin: 0px 0px 15px
}
#profile-header img#primaryphoto
{
 border: none;
 height: 54px;
 width: 54px;
 padding: 5px 0 0 5px
}
#profile #browse-friends td a
{
 font-size: 15px;
 font-weight: bold;
 text-decoration: none
}
#profile #browse-friends td img
{
 border: none;
 width: 110px;
 height: 110px;
 background: none none repeat scroll 0% 0%;
 margin: 0px;
 padding: 0px
}
#profile #browse-friends td p
{
 margin: 5px 0px 0px
}
div#body form td#blogurl
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 13px;
 line-height: 1.2;
 font-family: Arial,sans-serif
}
div#body form td#blogurl input
{
 width: 165px;
 display: inline
}
div#body form td#blogurl select
{
 display: inline;
 width: 100px
}
#profile #browse-friends td:hover
{
 background: rgb(240, 248, 255) none repeat scroll 0% 0%
}
#profile #profile-comments div.profile-comment img
{
 border: 1px solid rgb(255, 255, 255);
 width: 80px;
 height: 80px;
 background: none none repeat scroll 0% 0%;
 margin: 10px;
 padding: 2px
}
#profile #profile-comments div.profile-comment table
{
 border: 1px solid rgb(62, 164, 195);
 width: 490px;
 height: 100px;
 font-size: 15px;
 color: rgb(0, 0, 0);
 margin: 2px
}
#profile #profile-comments div.profile-comment td
{
 vertical-align: top
}
#profile #profile-comments div.profile-comment td.content
{
 font-style: italic;
 font-weight: bold;
 border-color: rgb(62, 164, 195) inherit inherit;
 border-style: solid inherit inherit;
 border-width: 1px inherit inherit
}
#profile #profile-comments div.profile-comment td.date
{
 height: 10px
}
#profile #profile-comments div.profile-comment td.image
{
 width: 100px;
 background: rgb(62, 164, 195) none repeat scroll 0% 0%
}
#profile #profile-comments div.profile-comment td.top
{
 color: rgb(255, 255, 255);
 font-weight: bold;
 text-indent: 2px;
 height: 10px;
 background: rgb(62, 164, 195) none repeat scroll 0% 0%
}
div#breadcrumbs .step div#breadcrumbs .step img
{
 border: 1px solid rgb(255, 0, 0);
 display: inline
}
"