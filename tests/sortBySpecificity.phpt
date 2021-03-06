--TEST--
Sort large CSS by specificity
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/blog.com.css');

include('include/parse.php');

$parser->result->sortBySpecificity();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(31284) "a
{
 color: rgb(93, 179, 203)
}
body
{
 background: rgb(255, 255, 255) url("/images/internal.bg.png") repeat-x scroll top left;
 border: 0px;
 margin: 0px;
 padding: 85px 0px 0px 0px;
 color: rgb(153, 153, 153);
 text-align: center
}
h1
{
 background-image: url("/images/navh2.png");
 height: 35px;
 width: 766px;
 color: rgb(51, 102, 153);
 padding-left: 12px;
 padding-top: 7px;
 font-size: 25px;
 margin-top: 5px;
 margin-bottom: 0px;
 text-align: left
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
 background: transparent url("/images/albumtitle.bg.png") no-repeat scroll top left;
 padding: 14px 0px 0px 18px;
 position: relative
}
.albumtitle-album
{
 position: absolute;
 top: 70px;
 left: 20px
}
.albumtitle-album
{
 font: normal normal normal 25px/1.5 Arial,sans-serif
}
.albumtitle-photocount
{
 font: normal normal normal 11px/1.4 Arial,sans-serif
}
.albumtitle-photocount
{
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
 font: normal normal bold 14px/1 Arial,sans-serif
}
.albumtitle-type
{
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
 padding: 10px 0px 67px 172px;
 margin: 5px;
 text-align: left;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
.country-header
{
 background-image: url("/images/countries/country.png")
}
.country-header-cn
{
 background-image: url("/images/countries/cn.p.png")
}
.country-header-de
{
 background-image: url("/images/countries/de.p.png")
}
.country-header-dk
{
 background-image: url("/images/countries/dk.p.png")
}
.country-header-fr
{
 background-image: url("/images/countries/fr.p.png")
}
.country-header-gr
{
 background-image: url("/images/countries/gr.p.png")
}
.country-header-hu
{
 background-image: url("/images/countries/hu.p.png")
}
.country-header-id
{
 background-image: url("/images/countries/id.p.png")
}
.country-header-it
{
 background-image: url("/images/countries/it.p.png")
}
.country-header-nl
{
 background-image: url("/images/countries/nl.p.png")
}
.country-header-pl
{
 background-image: url("/images/countries/pl.p.png")
}
.country-header-pt
{
 background-image: url("/images/countries/pt.p.png")
}
.country-header-ro
{
 background-image: url("/images/countries/ro.p.png")
}
.country-header-ru
{
 background-image: url("/images/countries/ru.p.png")
}
.country-header-uk
{
 background-image: url("/images/countries/uk.p.png")
}
.faces-foto,
.framed-foto
{
 background-image: url("/images/frame.png");
 background-repeat: no-repeat;
 height: 125px;
 width: 127px;
 padding-left: 17px;
 padding-top: 17px;
 padding-bottom: 17px
}
.greenbox
{
 background: rgb(130, 222, 39) url("/images/greenbox.bottom.png") no-repeat scroll bottom left;
 width: 299px;
 margin: 0px 0px 20px 0px;
 padding: 41px 0px 21px 0px;
 color: rgb(255, 255, 255);
 position: relative
}
.greenbox-title
{
 font: normal normal normal 18px/1.5 Arial,sans-serif
}
.greenbox-title
{
 position: absolute;
 top: 0px;
 left: 0px;
 width: 299px;
 background: rgb(130, 222, 39) url("/images/greenbox.top.png") no-repeat scroll top left;
 margin: 0px;
 padding: 4px 0px 0px 0px;
 text-align: center
}
.imagepick
{
 padding-top: 20px;
 padding-bottom: 20px
}
.large-framed-foto
{
 display: block;
 padding: 0px 13px;
 background: transparent url("/images/largeframe.middle.png") repeat-y scroll top left
}
.large-framed-foto-bottom
{
 width: 347px;
 margin: 0px;
 padding: 0px 0px 14px 0px;
 background: rgb(0, 128, 0) url("/images/largeframe.bottom.png") no-repeat scroll bottom left
}
.large-framed-foto-top
{
 width: 347px;
 margin: 0px;
 padding: 14px 0px 0px 0px;
 background: rgb(255, 0, 0) url("/images/largeframe.top.png") no-repeat scroll top left
}
.logo
{
 margin-right: 10px;
 position: absolute;
 z-index: -10px;
 top: 410px;
 right: 395px;
 border: 0px;
 color: rgb(255, 255, 255)
}
.paginator-current-page
{
 background-color: rgb(114, 194, 221);
 color: rgb(255, 255, 255);
 border: 1px solid rgb(114, 194, 221)
}
.paginator-page
{
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
.paginator-page
{
 color: rgb(114, 194, 221);
 border: 1px solid rgb(229, 229, 229);
 padding-left: 5px;
 padding-right: 5px
}
.paginator-pages
{
 color: rgb(10, 134, 170)
}
.paginator-pages
{
 font: normal normal normal 14px/1 Arial,sans-serif
}
.paginator-pages-next
{
 line-height: 16px;
 vertical-align: middle;
 padding-top: 17px;
 padding-bottom: 25px;
 margin-top: 17px;
 border-top: 1px solid rgb(180, 214, 223);
 width: 100%
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
 border-bottom: 1px solid rgb(229, 229, 229);
 padding: 10px 0px 10px 0px;
 color: rgb(102, 102, 102)
}
.photo-properties
{
 padding-left: 20px;
 padding-right: 20px;
 padding-top: 10px;
 padding-bottom: 10px;
 color: rgb(102, 102, 102);
 border-bottom: 1px solid rgb(229, 229, 229)
}
.photo-properties
{
 font: normal normal bold 14px/1 Arial,sans-serif
}
.photo-subtitle
{
 font: normal normal bold 9px/1.4 Arial,sans-serif
}
.photo-subtitle
{
 display: block;
 color: rgb(130, 222, 39);
 text-transform: lowercase
}
.photo-tags
{
 font: normal normal bold 14px/1 Arial,sans-serif
}
.photo-tags
{
 color: rgb(84, 171, 196)
}
.photo-tags-title
{
 color: rgb(10, 134, 170);
 display: block
}
.photo-tags-title
{
 font: normal normal normal 18px/1.5 Arial,sans-serif
}
.phototitle
{
 background: transparent url("/images/phototitle.bg.png") no-repeat scroll top left;
 height: 52px;
 min-width: 400px
}
.phototitle-td
{
 width: 400px
}
.phototitle-title
{
 color: rgb(255, 255, 255);
 margin-left: 20px
}
.phototitle-title
{
 font: normal normal normal 18px/1.5 Arial,sans-serif
}
.phototitle-type
{
 color: rgb(130, 222, 39);
 margin-left: 20px;
 padding-top: 10px
}
.phototitle-type
{
 font: normal normal normal 10px/1.4 Arial,sans-serif
}
.private-album-notice
{
 padding: 15px
}
.small-framed-foto
{
 display: block;
 background: transparent url("/images/smallframe.png") no-repeat scroll top center;
 background-image: url("/images/smallframe.png");
 background-repeat: no-repeat;
 padding: 9px;
 margin: 0px;
 border: 0px;
 width: 59px
}
.small-framed-foto-bottom
{
 width: 150px;
 margin: 0px;
 padding: 0px 0px 14px 0px;
 background: rgb(0, 128, 0) url("/images/smallframe.bottom.png") no-repeat scroll bottom left
}
.small-framed-foto-middle
{
 display: block;
 text-decoration: none;
 padding: 0px 13px;
 background: transparent url("/images/smallframe.middle.png") repeat-y scroll top left
}
.small-framed-foto-top
{
 width: 150px;
 margin: 0px;
 padding: 14px 0px 0px 0px;
 background: rgb(255, 0, 0) url("/images/smallframe.top.png") no-repeat scroll top left
}
.albumtitle a
{
 color: rgb(255, 255, 255)
}
.albumtitle-tagsearch label
{
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
.albumtitle-tagsearch label
{
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
 background: transparent url("/images/greenbox.bullet.png") no-repeat scroll center left;
 line-height: 20px;
 padding-left: 14px;
 margin-left: 14px
}
.greenbox li,
.greenbox ul
{
 margin: 0px;
 padding: 0px;
 list-style: none
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
 background-color: rgb(229, 229, 229);
 text-decoration: none
}
.profile-page h2
{
 display: block;
 width: 525px;
 height: 57px;
 line-height: 57px;
 color: rgb(18, 150, 182);
 font: normal normal normal 21px/57px serif;
 background: url("/images/h2.wide.png") no-repeat scroll top left;
 padding-left: 10px
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
 position: absolute;
 width: 100px;
 color: rgb(255, 255, 255) !important;
 text-decoration: none;
 text-align: left;
 margin: 0px;
 padding-left: 5px;
 padding-right: 36px;
 padding-top: 4px;
 padding-bottom: 3px;
 border: 1px solid rgb(255, 255, 255);
 background: rgb(103, 191, 9) url("/images/select.png") no-repeat scroll top right;
 white-space: nowrap
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
 padding-right: 50px
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
 padding-top: 124px
}
div.blog-feature
{
 background: url("/images/blog-feature.png") no-repeat scroll top left;
 font: normal normal normal 26px/1 Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
div.frame
{
 width: 64px;
 height: 64px;
 margin-left: 0px;
 margin-right: 10px;
 background-image: url("/images/photo-frame.png")
}
div.greenbutton
{
 background: transparent url("/images/button.green.gif") no-repeat scroll center center;
 width: 106px;
 height: 24px;
 margin: 0px auto;
 text-align: center;
 text-transform: lowercase;
 color: rgb(255, 255, 255)
}
div.next
{
 float: right
}
div.nextbutton
{
 font: normal normal normal 12px/2 Arial,sans-serif
}
div.nextbutton
{
 float: right;
 width: 133px;
 height: 24px;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
div.photo-feature
{
 background: url("/images/photo-feature.png") no-repeat scroll top left;
 font: normal normal normal 26px/1 Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
div.prevbutton
{
 font: normal normal normal 12px/2 Arial,sans-serif
}
div.prevbutton
{
 float: right;
 width: 133px;
 height: 24px;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
div.prevbutton
{
 background: transparent url("/images/button.greenprevious.gif") no-repeat scroll top left;
 padding-right: 10px;
 padding-left: 23px
}
div.preview
{
 text-align: center;
 width: 105px;
 height: 105px;
 padding-top: 5px
}
div.previous
{
 float: left
}
div.pricing-support
{
 background: url("/images/pricing-support.png") no-repeat scroll top left;
 font: normal normal normal 26px/1 Arial,sans-serif;
 color: rgb(255, 255, 255);
 padding: 40px 0px 0px 90px
}
img.profile-photos-verysmall
{
 background-image: url("/images/photo-frame.png");
 height: 54px;
 width: 54px;
 border: none;
 padding: 5px;
 margin-right: 10px;
 margin-bottom: 10px
}
img.profileimage-verysmall
{
 height: 54px;
 width: 54px;
 padding-left: 5px;
 padding-top: 5px;
 border: none
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
 background-image: url("/images/currentDir.png");
 background-repeat: no-repeat;
 background-attachment: scroll;
 background-position: center left;
 position: relative;
 left: -18px
}
span.green
{
 font: normal normal normal 18px serif;
 color: rgb(138, 199, 82)
}
span.marvin-widget-dropdownlist
{
 position: relative
}
table.data,
table.layout
{
 width: 100%
}
table.layout
{
 border: 0px solid rgb(0, 128, 0)
}
td.col-right
{
 border-left: 35px solid rgb(255, 255, 255)
}
td.photo-next,
td.photo-previous
{
 padding-top: 20px;
 padding-bottom: 20px;
 border-bottom: 1px solid rgb(229, 229, 229)
}
td.title
{
 vertical-align: top;
 padding-top: 10px
}
ul.directory-list-directories
{
 margin: 0px;
 padding: 0px 0px 0px 10px;
 list-style-type: none
}
ul.marvin-widget-dropdownlist-list
{
 position: absolute;
 width: 136px;
 left: 0px;
 top: 8px;
 background: rgb(103, 191, 9);
 margin: 0px;
 padding: 5px 0px 5px 5px;
 list-style: none;
 border-style: solid;
 border-color: rgb(255, 255, 255);
 border-width: 0px 1px 1px 1px
}
li.directory-list-current a
{
 padding-left: 18px
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
 background: rgb(51, 102, 153)
}
table.layout td
{
 vertical-align: top
}
ul.directory-list-directories li
{
 margin: 0px;
 padding: 0px 0px 0px 0px
}
ul.marvin-widget-dropdownlist-list li
{
 margin: 4px 0px;
 padding: 0px 5px 0px 0px;
 white-space: nowrap
}
ul.marvin-widget-dropdownlist-list li a
{
 color: rgb(255, 255, 255) !important;
 border: 1px solid rgb(255, 255, 255);
 border-width: 0px 0px 0px 0px
}
.customizeblogheaderzoom .imagepick,
.customizeblogzoom .imagepick
{
 background: transparent url("/images/zoom.bottom.gif") no-repeat scroll bottom left;
 padding: 0px 0px 10px 0px
}
.profile-page .button
{
 display: block;
 padding: 3px 10px;
 color: rgb(255, 255, 255);
 border: 1px solid rgb(18, 150, 182);
 background: rgb(114, 194, 221);
 text-decoration: none;
 width: 150px
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
 position: absolute;
 top: 16px;
 left: 0px;
 width: 183px;
 height: 22px;
 border: 1px solid rgb(88, 140, 154);
 line-height: 22px;
 vertical-align: middle
}
.imagepick div.white
{
 background: transparent url("/images/imagepick.bottom.gif") no-repeat bottom left;
 margin: 0px;
 padding: 0px 0px 35px 0px;
 width: 187px;
 height: 100%;
 text-align: center;
 overflow: hidden
}
.profile-page h2.small
{
 width: 205px;
 font: normal normal normal 20px/57px serif;
 background: url("/images/h2.wide-small.png") no-repeat scroll top left
}
.success div.whiterounded
{
 font: normal normal normal 13px/1.2 Arial,sans-serif
}
.success div.whiterounded
{
 width: 434px;
 padding: 20px 20px 20px 20px;
 margin: 0px 0px 0px auto;
 background: rgb(255, 255, 255) url("/images/whiterounded-success.top.png") no-repeat scroll top right;
 text-align: left
}
.success div.whiterounded-bottom
{
 background: transparent url("/images/whiterounded-success.bottom.gif") no-repeat scroll top right;
 width: 474px;
 height: 18px;
 margin: 0px 0px 0px auto
}
.success input.submit
{
 margin: 0px 0px 0px auto;
 position: absolute;
 top: 142px;
 left: 440px;
 background: transparent url("/images/button-success.greennext.gif") no-repeat scroll bottom left
}
.tagcloud a:hover
{
 text-decoration: underline
}
div.frame.top
{
 margin-left: 15px
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
 background: transparent url("/images/icons/video.png") no-repeat scroll bottom right
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
 margin: 5px 0px 0px 0px;
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
 background-color: rgb(255, 255, 255)
}
table.data tr.odd
{
 color: rgb(255, 255, 255);
 background-color: rgb(236, 246, 248)
}
.customizeblogheaderzoom .imagepick .white,
.customizeblogzoom .imagepick .white
{
 background: rgb(255, 255, 255) url("/images/zoom.top.gif") no-repeat scroll top left;
 width: 575px;
 padding: 10px 13px 0px 13px
}
.customizeblogheaderzoom .imagepick .white img,
.customizeblogzoom .imagepick .white img
{
 max-width: 575px;
 overflow: hidden
}
#actions
{
 margin-top: 20px;
 list-style: none;
 font: normal normal normal 15px/20px serif
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
 background-image: url("/images/frame.png");
 background-repeat: no-repeat;
 height: 125px;
 width: 127px;
 padding-left: 17px;
 padding-top: 17px;
 padding-bottom: 17px
}
#faces-header
{
 background-image: url("/images/manyfaces.png");
 height: 36px;
 width: 568px;
 color: rgb(51, 102, 153);
 padding-left: 172px;
 padding-top: 52px;
 font-size: 12px;
 margin-top: 5px;
 margin-bottom: 0px;
 text-align: left;
 color: rgb(89, 119, 126)
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
 padding: 10px 0px 67px 172px;
 margin: 5px;
 text-align: left;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
#happybirthday-header
{
 background-image: url("/images/happy.png");
 padding: 52px 0px 25px 172px;
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
#header
{
 position: absolute;
 height: 85px;
 width: 739px;
 margin-left: auto;
 margin-right: auto;
 top: 0px;
 background: rgb(114, 194, 221) url("/images/header.bg.png") no-repeat scroll top left;
 text-decoration: none
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
#language-header
{
 background-image: url("/images/language.png")
}
#language-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 padding: 10px 0px 67px 172px;
 margin: 5px;
 text-align: left;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
#photos-header
{
 background-image: url("/images/photos.png");
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
#photos-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 padding: 10px 0px 67px 172px;
 margin: 5px;
 text-align: left;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
#photos-header-title
{
 color: rgb(18, 150, 182);
 text-align: left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
#profile-bottom
{
 margin-bottom: 5px;
 height: 36px;
 width: 740px;
 background: url("/images/profile-bottom.png") no-repeat scroll top left
}
#profile-header
{
 border-top-width: 0px !important;
 width: 740px;
 color: rgb(18, 150, 182);
 text-align: left;
 background: url("/images/profile-main.png") repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif;
 height: auto
}
#profile-title
{
 position: relative;
 display: inline
}
#profile-top
{
 border-top: 10px solid rgb(255, 255, 255);
 height: 9px;
 width: 740px;
 background: url("/images/profile-top.png") no-repeat scroll top left
}
#slideshow
{
 width: 160px;
 height: 74px;
 margin-left: 30px;
 margin-bottom: 270px
}
#title
{
 font: normal normal normal 32px/1.2 Arial,sans-serif
}
#updated-header
{
 background-image: url("/images/updated.png")
}
#updated-header
{
 height: 36px;
 width: 568px;
 color: rgb(18, 150, 182);
 padding: 10px 0px 67px 172px;
 margin: 5px;
 text-align: left;
 background: rgb(255, 255, 255) none no-repeat scroll top left;
 font: normal normal normal 25px/1.4 Arial,sans-serif
}
#actions a
{
 text-decoration: none;
 margin-left: 10px;
 margin-bottom: 50px
}
#faces p
{
 padding-left: 0px;
 font-size: 14px
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
 background-image: url("/images/happy_post.png");
 background-repeat: no-repeat;
 font-size: 13px;
 text-align: left;
 color: rgb(18, 150, 182);
 height: 57px;
 width: 568px;
 padding-left: 5px;
 padding-top: 5px;
 margin-top: 0px;
 margin-left: 172px
}
#happybirthday img
{
 background-image: url("/images/happybirthdayphoto.png");
 border: 0px;
 padding: 21px 17px 20px 16px;
 margin: 0px 0px 0px 0px;
 height: 115px;
 width: 115px;
 position: absolute
}
#happybirthday li
{
 list-style-type: none;
 font-size: 12px;
 text-align: left
}
#happybirthday ul
{
 color: rgb(0, 0, 0);
 font-size: 13px;
 list-style: none;
 margin: 0px;
 padding: 0px;
 margin-left: 172px;
 width: 495px;
 min-height: 100px
}
#happybirthday-header h1
{
 display: none
}
#header-menu li
{
 display: inline;
 padding: 0px 3px 0px 11px;
 background: transparent url("/images/header.menuseparator.png") no-repeat scroll bottom left
}
#header-menu li
{
 margin: 0px;
 padding: 0px
}
#header-menu ul
{
 list-style-type: none
}
#photos-header h1
{
 display: none
}
div#body
{
 color: rgb(71, 101, 109)
}
div#body
{
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
div#body
{
 background: rgb(181, 218, 229) url("/images/body.bg.png") no-repeat scroll top right;
 min-height: 420px;
 margin: 8px 0px 0px 78px;
 padding: 24px 30px;
 text-align: left
}
div#body-bottom
{
 background: transparent url("/images/body.bottom.png") no-repeat scroll top right;
 height: 16px;
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
 margin: 0px auto;
 width: 739px;
 text-align: left
}
div#footer
{
 background: rgb(255, 255, 255) url("/images/footer.bg.png") no-repeat scroll top left;
 color: rgb(102, 102, 102);
 text-align: left;
 display: block;
 height: 13px;
 width: 739px;
 padding: 13px 0px 13px 0px;
 margin: 40px auto 0px auto
}
div#footer
{
 font: normal normal normal 12px/1.2 Arial,sans-serif
}
div#title
{
 background: transparent url("/images/title.bg.png") no-repeat scroll top right;
 line-height: 62px;
 color: rgb(255, 255, 255);
 text-align: left;
 padding-left: 95px
}
img#logo
{
 position: relative;
 top: -8px;
 border: 0px;
 height: 93px
}
ul#header-menu
{
 margin: 0px;
 padding: 0px
}
#header-menu li a
{
 font: normal normal normal 10px/1.4 Arial,sans-serif
}
#header-menu li a
{
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
 border-width: 1px 0px 0px 0px;
 vertical-align: top
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
 background-image: none;
 height: 25px
}
.photos #header
{
 background: transparent url("/images/header.photos.bg.png") no-repeat scroll top left
}
.profile-page #detail
{
 list-style: none;
 font: normal normal normal 15px/20px serif;
 margin: 0px;
 padding-left: 15px
}
.profile-page #friendlist
{
 margin-left: 15px
}
.success #body-bottom
{
 display: none
}
#header-menu li.first
{
 background: none
}
.createblog div#title
{
 background-image: url("/images/title.2.bg.png")
}
.createuser div#title
{
 background-image: url("/images/title.1.bg.png")
}
.customizeblog div#body
{
 text-align: center
}
.customizeblog div#title
{
 background-image: url("/images/title.3.bg.png")
}
.fckeditor div#body
{
 padding-top: 5px
}
.fckeditor div#breadcrumbs
{
 height: 10px
}
.success div#body
{
 background-color: rgb(210, 233, 239);
 background-image: url("/images/body-success.bg.png");
 min-height: 0px;
 height: 155px;
 text-align: right;
 position: relative;
 margin-bottom: 18px
}
.success div#title
{
 background-image: url("/images/title.s.bg.png")
}
div#body .greenbutton
{
 font: normal normal normal 12px/2 Arial,sans-serif
}
div#breadcrumbs .step
{
 font: normal normal normal 14px/1 Arial,sans-serif
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
 display: block;
 width: 166px;
 height: 37px;
 border: 0px;
 margin: 0px;
 padding: 0px 0px 0px 13px;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll bottom left;
 color: rgb(255, 255, 255);
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
div#body input.submit
{
 font: normal normal normal 16px/1.5 Arial,sans-serif
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
 background: transparent url("/images/form.error.bg.gif") no-repeat scroll top left;
 padding: 4px 4px 4px 15px;
 color: rgb(201, 85, 52)
}
div#body form td.help
{
 background: transparent url("/images/form.help.bg.gif") no-repeat scroll top left;
 padding: 4px 4px 4px 15px;
 text-align: left
}
div#body form td.help
{
 font: normal normal normal 11px/1.4 Arial,sans-serif
}
div#body form td.help-empty
{
 background-image: none
}
div#body form td.input
{
 width: 260px;
 padding: 4px
}
div#body form td.input
{
 font: normal normal normal 13px/1.2 Arial,sans-serif
}
div#body form td.label
{
 width: 132px;
 padding: 4px
}
div#body form td.label
{
 font: normal normal normal 13px/1.2 Arial,sans-serif
}
div#body form td.tags
{
 padding: 4px 4px 4px 15px;
 text-align: left
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
 background: transparent url("/images/imagepick.bottom.gif") no-repeat scroll bottom left;
 width: 187px;
 margin: 0px;
 padding: 0px 19px 35px 0px
}
div#body td.imagepick th
{
 background: transparent url("/images/imagepick.top.gif") no-repeat scroll top left;
 width: 187px;
 padding: 13px 21px 0px 0px;
 margin: 0px 0px 0px 0px;
 border: 0px;
 padding-right: 0px
}
div#body form td.help p
{
 margin-top: 0;
 margin-bottom: 2em
}
div#body form td.input select
{
 width: 230px
}
div#body form td.input textarea
{
 height: 65px
}
div#body form td.input textarea
{
 width: 230px
}
.profile-page #friendlist .nickname
{
 text-align: center
}
.customizeblog div#body div.nextbutton,
.customizeblog div#body div.prevbutton
{
 float: right;
 width: 133px;
 height: 24px;
 background: transparent url("/images/button.greennext.gif") no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
.customizeblog div#body div.prevbutton
{
 background: transparent url("/images/button.greenprevious.gif") no-repeat scroll top left;
 padding-right: 10px;
 padding-left: 23px
}
div#body form td.label .optional
{
 font: normal normal normal 10px/1.4 Arial,sans-serif
}
div#body form td.label .optional
{
 display: block
}
div#body td.imagepick td.last
{
 padding-right: 0px
}
div#body td.imagepick th.empty
{
 background-image: none
}
div#body td.imagepick th.last
{
 padding-right: 0px
}
div#body form td.input input.text
{
 width: 230px
}
#footer #footer-copyright
{
 float: left;
 margin-left: 14px
}
#footer #footer-menu
{
 float: right;
 margin-right: 15px
}
#header #header-banner
{
 position: absolute;
 top: 20px;
 left: 261px;
 border: 0px;
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
 border-style: solid;
 border-color: rgb(255, 255, 255);
 border-width: 5px 5px 0px 5px
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
 margin: 0px 0px 15px 0px
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
 margin: 0px 0px 15px 0px
}
#profile-header img#primaryphoto
{
 height: 54px;
 width: 54px;
 padding-left: 5px;
 padding-top: 5px;
 border: none
}
#profile #browse-friends td a
{
 font-size: 15px;
 font-weight: bold;
 text-decoration: none
}
#profile #browse-friends td img
{
 background: none;
 margin: 0px 0px 0px 0px;
 padding: 0px 0px 0px 0px;
 width: 110px;
 height: 110px;
 border: none
}
#profile #browse-friends td p
{
 margin: 5px 0px 0px 0px
}
div#body form td#blogurl
{
 font: normal normal normal 13px/1.2 Arial,sans-serif
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
 background-color: rgb(240, 248, 255)
}
#profile #profile-comments div.profile-comment img
{
 background: none;
 width: 80px;
 height: 80px;
 margin: 10px;
 padding: 2px;
 border: 1px solid rgb(255, 255, 255)
}
#profile #profile-comments div.profile-comment table
{
 border: 1px solid rgb(62, 164, 195);
 margin: 2px;
 width: 490px;
 height: 100px;
 font-size: 15px;
 color: rgb(0, 0, 0)
}
#profile #profile-comments div.profile-comment td
{
 vertical-align: top
}
#profile #profile-comments div.profile-comment td.content
{
 font-style: italic;
 font-weight: bold;
 border-top: 1px solid rgb(62, 164, 195)
}
#profile #profile-comments div.profile-comment td.date
{
 height: 10px
}
#profile #profile-comments div.profile-comment td.image
{
 width: 100px;
 background-color: rgb(62, 164, 195)
}
#profile #profile-comments div.profile-comment td.top
{
 background-color: rgb(62, 164, 195);
 color: rgb(255, 255, 255);
 font-weight: bold;
 text-indent: 2px;
 height: 10px
}
div#breadcrumbs .step div#breadcrumbs .step img
{
 border: 1px solid rgb(255, 0, 0);
 display: inline
}
"
