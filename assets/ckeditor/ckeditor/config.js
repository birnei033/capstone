/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */
const base_url ="/ignite";
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#66ba6a';
   config.filebrowserUploadMethod = 'form';
	config.filebrowserBrowseUrl = '/ignite/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = '/ignite/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = '/ignite/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = '/ignite/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = '/ignite/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = '/ignite/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
   config.skin = 'kama';
   // config.extraPlugins = 'image2';
   config.extraPlugins = 'embed,embedbase,notificationaggregator,notification,youtube,codesnippet,quicktable,bt_table,panelbutton,floatpanel,language';
   config.youtube_responsive = true;
   config.allowedContent = true;
   config.image_previewText = CKEDITOR.tools.repeat( ' ', 1 );

};
