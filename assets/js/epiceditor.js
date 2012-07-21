/* ==========================================================
 * EpicEditor-for-WordPress - jQuery EpicEditor Magic
 * https://github.com/sebnitu/EpicEditor-for-WordPress
 * ==========================================================
 * Copyright 2012 Sebastian Nitu.
 * ========================================================== */

/**
 * Global Variables
 */
var eeTools;

jQuery(document).ready( function($) {
  	
  	/**
  	 * Variables
  	 */
	var default_content = $('textarea#content').val()
	,	content = default_content
	,	active_editor = ''
	,	editor_height = '380px'
	, 	tools_height = ''
	,	editor_cookie = getUserSetting('editor')
	
	// Form elements
	,	form_element = $('form#post')
	,	form_submit_btn = $('#publish')
	,	form_preview_btn = $('#post-preview')
	
	// Templates
	,   tpl_tab = '<a id="content-eemd" class="hide-if-no-js wp-switch-editor switch-markdown" onclick="switchEditors.switchto(this);">Markdown</a>'
	,   tpl_container = '<div id="epiceditor_wrap"><div id="epiceditor_box"></div><div id="epiceditor_resizable"></div><div id="epiceditor_resizable_mask"></div></div>'
	
	// Template Tools
	,	tpl_tools_before = '<div id="markdown_toolbar" class="quicktags-toolbar">'
	,	tpl_tools_btn_reload = '<input type="button" id="ee_reload" class="ed_button markdown_button" title="Reload EpicEditor" value="Reload" onclick="eeTools.reload();">'
	,	tpl_tools_btn_edit = '<input type="button" id="ee_edit" class="ed_button markdown_button" title="Enter edit mode" value="Edit" onclick="eeTools.editMode()">'
	,	tpl_tools_btn_preview = '<input type="button" id="ee_preview" class="ed_button markdown_button" title="Enter preview mode" value="Preview" onclick="eeTools.previewMode()">'
	,	tpl_tools_btn_fullscreen = '<input type="button" id="ee_fullscreen" class="ed_button markdown_button" title="Enter fullscreen mode" value="Fullscreen" onclick="eeTools.fullscreen()">'
	,	tpl_tools_btn_syntax = '<input type="button" id="ee_syntax_guide" class="ed_button markdown_button" title="Markdown syntax guide" value="Markdown Syntax" onclick="eeTools.overlay(\'syntax-guide\')">'
	,	tpl_tools_after = '</div>'
	,	tpl_tools_sep = '<span class="tools_sep"></span>'
	,	tpl_tools = 
			tpl_tools_before
		//+	tpl_tools_btn_reload
		//+	tpl_tools_sep // Seperator
		//+	tpl_tools_btn_edit
		//+	tpl_tools_btn_preview
		//+	tpl_tools_sep // Seperator
		//+	tpl_tools_btn_fullscreen
		+	tpl_tools_btn_syntax
		+	tpl_tools_after
	
	// locations
	,   loc_editor_tools = $('#wp-content-editor-tools').prepend(tpl_tab)
	,   loc_editor_container = $('#wp-content-editor-container').append(tpl_container)
	,   loc_editor_toolbar = $('#ed_toolbar').before(tpl_tools)
	
	// Editor Parts
	,	editor_content_wrap = $('#wp-content-wrap')
	,	editor_nav = $('.wp-switch-editor')
	
	// Editors
	,	editor_visual = $('#content_parent')
	,	editor_html = $('#content')
	,	ee_wrap = $('#epiceditor_wrap')
	,	ee_box = $('#epiceditor_box')
	,	ee_resize = $('#epiceditor_resizable').resizable({
			alsoResize : '#epiceditor_wrap, #epiceditor_box'
		,	handles : 's'
		})
	,	ee_resize_mask = $('#epiceditor_resizable_mask')
	,	ee_height = getUserSetting('ee_height');
	
	/**
	 * EpicEditor Options
	 */
	var opts = {
		container : 'epiceditor_box',
		basePath  : php_params.base_path + 'epiceditor',
		clientSideStorage : false,
		file : {
			defaultContent : toMarkdown( default_content ),
		},
		theme : {
			editor : '/themes/editor/ee-for-wordpress.css'
		},
	}
	var eEditor = new EpicEditor(opts).load().unload();
	
	if ( '' != ee_height) {
		ee_box.height( ee_height + 'px' );
		ee_wrap.height( ee_height + 'px' );
		ee_wrap.hide();
	}
	
	ee_resize.bind( "resizestart", function(event, ui) {
		ee_box.css({ 'opacity' : '0.5' });
		ee_resize_mask.show().height( ee_box.height() );
	});
	ee_resize.bind( "resizestop", function(event, ui) {
		eEditor.load();
		ee_box.css({ 'opacity' : '1' });
		ee_resize_mask.hide().height( '100%' );
		
		// Set widths to auto so they are still fluid
		ee_wrap.width('auto');
		ee_box.width('auto');
		ee_resize.width('100%');
		
		// Save editors height
		setUserSetting('ee_height', ee_wrap.height() );
	});
	
	/**
	 * Re-writing the switchEditors object methods
	 */
	switchEditors.go = function(id, mode) { // mode can be 'html', 'tmce', or 'toggle'
		id = id || 'content';
		mode = mode || 'toggle';
				
		var t = this, ed = tinyMCE.get(id), wrap_id, txtarea_el, dom = tinymce.DOM;
		
		wrap_id = 'wp-'+id+'-wrap';
		txtarea_el = dom.get(id);
		
		if ( 'toggle' == mode ) {
			if ( ed && !ed.isHidden() )
				mode = 'eemd'; // html
			else
				mode = 'eemd'; // tmce
		}
		
		// Editor Switching
		if ( 'tmce' == mode || 'tinymce' == mode ) {
			
			
			// Check if editor is already active.
			if ( ed && ! ed.isHidden() && eEditor.is('unloaded') )
				return false;
			
			// Get the content of previous editor
			if ( editor_content_wrap.hasClass('markdown-active') ) {
				content = eEditor.exportFile( null, 'html'); // Get HTML content from EpicEditor
				editor_html.val( content ); // Set content to Textarea
				if ( ed ) {
					tinyMCE.activeEditor.setContent( content ); // Set content to TinyMCE
				}
			}
			
			// Close all tags on textarea value
			if ( typeof(QTags) != 'undefined' )
				QTags.closeAllTags(id);
			
			// Run parser on textarea value
			if ( tinyMCEPreInit.mceInit[id] && tinyMCEPreInit.mceInit[id].wpautop )
				txtarea_el.value = t.wpautop( txtarea_el.value );
			
			// Hide Markdown
			if (eEditor.is('loaded'))
				eEditor.unload();
			
			// Show the proper editor
			if ( ed ) {
				ed.show();
			} else {
				ed = new tinymce.Editor(id, tinyMCEPreInit.mceInit[id]);
				ed.render();
			}
						
			// Set the height of wrapper
			ee_wrap.hide();
			
			// Toggle classes and save user settings
			dom.removeClass(wrap_id, 'markdown-active');
			dom.removeClass(wrap_id, 'html-active');
			dom.addClass(wrap_id, 'tmce-active');
			setUserSetting('editor', 'tinymce');
			
		} else if ( 'html' == mode ) {
			
			// Check if editor is already active.
			if ( ed && ed.isHidden() && eEditor.is('unloaded') )
				return false;
			
			// Get the content of previous editor
			if ( editor_content_wrap.hasClass('markdown-active') ) {
				content = eEditor.exportFile( null, 'html'); // Get HTML content from EpicEditor
				editor_html.val( content ); // Set content to Textarea
				if ( ed ) {
					tinyMCE.activeEditor.setContent( content ); // Set content to TinyMCE
				}
			}
			
			// Close all tags on textarea value
			if ( typeof(QTags) != 'undefined' )
				QTags.closeAllTags(id);
			// Run parser on textarea value
			if ( tinyMCEPreInit.mceInit[id] && tinyMCEPreInit.mceInit[id].wpautop )
				txtarea_el.value = t.wpautop( txtarea_el.value );
			
			// Hide TinyMCE
			if ( ed ) {
				ed.hide();
			}
			
			// Hide Markdown
			if (eEditor.is('loaded'))
				eEditor.unload();
			
			// Set the height of wrapper
			ee_wrap.hide();
			
			// Show the proper editor
			editor_html.show();
			
			// Toggle classes and save user settings
			dom.removeClass(wrap_id, 'markdown-active');
			dom.removeClass(wrap_id, 'tmce-active');
			dom.addClass(wrap_id, 'html-active');
			setUserSetting('editor', 'html');
			
		} else if ( 'eemd' == mode || 'markdown' == mode ) {
			
			if ( eEditor.is('loaded') )
				return false;
			
			// Close all tags on textarea value
			if ( typeof(QTags) != 'undefined' )
				QTags.closeAllTags(id);
			
			// Run parser on textarea value
			if ( tinyMCEPreInit.mceInit[id] && tinyMCEPreInit.mceInit[id].wpautop )
				txtarea_el.value = t.wpautop( txtarea_el.value );
			
			// Set the height of wrapper
			ee_wrap.show();
			
			// Show the proper editor
			eEditor.load();
			
			// Get the content of previous editor
			if ( editor_content_wrap.hasClass('tmce-active') ) {
				content = tinyMCE.activeEditor.getContent(); // Get tinyMCE content
				eEditor.importFile( null, toMarkdown( content ) ); // Set content in EpicEditor
			} else {
				content = txtarea_el.value; // Get Textarea content
				eEditor.importFile( null, toMarkdown( content ) ); // Set content in EpicEditor
			}
			
			// Hide TinyMCE editor
			if ( ed ) {
				ed.hide();
			}
			
			// Hide HTML editor
			editor_html.hide();
			
			// Toggle classes and save user settings
			dom.removeClass(wrap_id, 'tmce-active');
			dom.removeClass(wrap_id, 'html-active');
			dom.addClass(wrap_id, 'markdown-active');
			setUserSetting('editor', 'markdown');
		}
		
		return false;
	}
	
	/**
	 * Re-write Autosave
	 */
	autosave = function() {
				
		// (bool) is rich editor enabled and active
		blockSave = true;
		var rich = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden(),
			post_data, doAutoSave, ed, origStatus, successCallback;
	
		autosave_disable_buttons();
	
		post_data = {
			action: "autosave",
			post_ID:  jQuery("#post_ID").val() || 0,
			autosavenonce: jQuery('#autosavenonce').val(),
			post_type: jQuery('#post_type').val() || "",
			autosave: 1
		};
	
		jQuery('.tags-input').each( function() {
			post_data[this.name] = this.value;
		} );
	
		// We always send the ajax request in order to keep the post lock fresh.
		// This (bool) tells whether or not to write the post to the DB during the ajax request.
		doAutoSave = true;
	
		// No autosave while thickbox is open (media buttons)
		if ( jQuery("#TB_window").css('display') == 'block' )
			doAutoSave = false;
	
		/* Gotta do this up here so we can check the length when tinyMCE is in use */
		if ( rich && doAutoSave ) {
			ed = tinyMCE.activeEditor;
			// Don't run while the TinyMCE spellcheck is on. It resets all found words.
			if ( ed.plugins.spellchecker && ed.plugins.spellchecker.active ) {
				doAutoSave = false;
			} else {
				if ( 'mce_fullscreen' == ed.id || 'wp_mce_fullscreen' == ed.id )
					tinyMCE.get('content').setContent(ed.getContent({format : 'raw'}), {format : 'raw'});
				tinyMCE.triggerSave();
			}
		}
	
		if ( fullscreen && fullscreen.settings.visible ) {
			post_data["post_title"] = jQuery('#wp-fullscreen-title').val() || '';
			post_data["content"] = jQuery("#wp_mce_fullscreen").val() || '';
		} else {
			// Update textarea content with what EpicEditor
			// has if it's the active editor.
			if ( editor_content_wrap.hasClass('markdown-active') ) {
				content = eEditor.exportFile( null, 'html'); // Get HTML content from EpicEditor
				editor_html.val( content ); // Set content to Textarea
				if (tinyMCE.editors.length > 0) {
					tinyMCE.activeEditor.setContent( content ); // Set content to TinyMCE
				}
			}
			
			post_data["post_title"] = jQuery("#title").val() || '';
			post_data["content"] = jQuery("#content").val() || '';
		}
			
		if ( jQuery('#post_name').val() )
			post_data["post_name"] = jQuery('#post_name').val();
	
		// Nothing to save or no change.
		if ( ( post_data["post_title"].length == 0 && post_data["content"].length == 0 ) || post_data["post_title"] + post_data["content"] == autosaveLast ) {
			doAutoSave = false;
		}
	
		origStatus = jQuery('#original_post_status').val();
	
		goodcats = ([]);
		jQuery("[name='post_category[]']:checked").each( function(i) {
			goodcats.push(this.value);
		} );
		post_data["catslist"] = goodcats.join(",");
	
		if ( jQuery("#comment_status").prop("checked") )
			post_data["comment_status"] = 'open';
		if ( jQuery("#ping_status").prop("checked") )
			post_data["ping_status"] = 'open';
		if ( jQuery("#excerpt").size() )
			post_data["excerpt"] = jQuery("#excerpt").val();
		if ( jQuery("#post_author").size() )
			post_data["post_author"] = jQuery("#post_author").val();
		if ( jQuery("#parent_id").val() )
			post_data["parent_id"] = jQuery("#parent_id").val();
		post_data["user_ID"] = jQuery("#user-id").val();
		if ( jQuery('#auto_draft').val() == '1' )
			post_data["auto_draft"] = '1';
	
		if ( doAutoSave ) {
			autosaveLast = post_data["post_title"] + post_data["content"];
			jQuery(document).triggerHandler('wpcountwords', [ post_data["content"] ]);
		} else {
			post_data['autosave'] = 0;
		}
	
		if ( post_data["auto_draft"] == '1' ) {
			successCallback = autosave_saved_new; // new post
		} else {
			successCallback = autosave_saved; // pre-existing post
		}
	
		autosaveOldMessage = jQuery('#autosave').html();
		jQuery.ajax({
			data: post_data,
			beforeSend: doAutoSave ? autosave_loading : null,
			type: "POST",
			url: ajaxurl,
			success: successCallback
		});
	}
	
	/**
	 * EpicEditor Tools
	 * This is a global variable
	 */
	eeTools = {
		
		reload : function() {
			console.log('Reload EpicEditor');
			
			return false;
		},
		
		editMode : function() {
			
			eEditor.edit();
			console.log('Edit mode');
			
			return false;
		},
		
		previewMode : function() {
			
			eEditor.preview();
			console.log('Preview mode');
			
			return false;
		},
		
		fullscreen : function() {
			
			console.log('Enter full screen mode');
			
			return false;
		},
		
		overlay : function(screen) {
			
			var overlay;
			
			if ( 'syntax-guide' == screen ) {
				
				overlay = $('#overlay-syntax-guide');
				
				// Load template via AJAX if it's not already there
				if ( overlay.length < 1 ) {
					$.ajax({
						url : php_params.base_path + 'templates/overlay-syntax-guide.php',
						success : function(data, textStatus, jqXHR) {
							// Append data and display as dialog
							$('body').append(data);
							
							// Grab the newly added overlay
							overlay = $('#overlay-syntax-guide');
							
							// Enhance our overlay
							eeTools.enhanceOverlay( overlay );
							
							// Open'er up
							overlay.dialog('open');
						}
					});
				} else {
					if ( overlay.dialog('isOpen') ) {
						overlay.dialog('close');
					} else {
						overlay.dialog('open');
					}
				}
				
			} else {
				alert('Sorry, but that overlay does not exist');
			}
			
			return false;
		},
		
		enhanceOverlay : function(el) {
			
			// Pre init variables
			var overlay = el
			,	windowHeight = ($(window).height() - 80);
			
			if ( windowHeight > 1000 )
				windowHeight = 1000;
			
			// Open Dialog
			overlay.dialog({
				autoOpen: false
			,	dialogClass: 'overlay-wrapper'
			,	closeOnEscape: true
			,	height: windowHeight
			,	width: 450
			,	minWidth: 320
			});
			
			// Table of contents functionality
			$('.table-of-contents').hide();
			$('.overlay-content .toggle-content').click(function() {
				$('.table-of-contents').slideToggle();
				return false;
			});
			
			// Accordion
			$('.accordion-content').hide();
			$('.accordion h3').click(function() {
				$(this).toggleClass('active');
				$(this).next( $('.accordion-content') ).slideToggle();
			});
			
			// When overlay is opened
			overlay.bind( "dialogopen", function(event, ui) {
				
				var widget = overlay.dialog( 'widget' )
				,	wrapperHeight = overlay.outerHeight()
				,	headerHeight = overlay.find('.overlay-header').outerHeight()
				,	footerHeight = overlay.find('.overlay-footer').outerHeight();
				
				overlay.find('.overlay-content').height( (wrapperHeight - ( headerHeight + footerHeight + 1 )) );
				
				// On resize
				widget.bind( "resize", function() {
					wrapperHeight = overlay.outerHeight();
					overlay.find('.overlay-content').height( (wrapperHeight - ( headerHeight + footerHeight + 1 )) );
				});
				
				widget.bind( "resizestart", function() {
					ee_box.css({ 'opacity' : '0.5' });
					ee_resize_mask.show().height( ee_box.height() );
				});
				widget.bind( "resizestop", function() {
					ee_box.css({ 'opacity' : '1' });
					ee_resize_mask.hide().height( '100%' );
				});
				
			});
			
			// Close Dialog
			overlay.find('.btn-close').click(function() {
				overlay.dialog('close');
				return false;
			});
			
		}
		
	}
	
	/**
	 * Capture Form Submission
	 * This updates the editors value before submission
	 * if we're on EpicEditor to make sure contet is submitted.
	 */
	form_element.each(function() {
		$(this).submit(function() {
			if ( editor_content_wrap.hasClass('markdown-active') ) {
				content = eEditor.exportFile( null, 'html'); // Get HTML content from EpicEditor
				editor_html.val( content ); // Set content to Textarea
				if (tinyMCE.editors.length > 0) {
					tinyMCE.activeEditor.setContent( content ); // Set content to TinyMCE
				}
			}
		});
	});

});

jQuery(window).load(function() {
	
	// Kind of silly, but only work around I could think of
	// to select markdown if it is the last editor used.
	// I also trigger it again after .25 seconds. Why? Because
	// I don't know how else to make sure it get's loaded properly.
	var editor_cookie = getUserSetting('editor');
    if (  'markdown' == editor_cookie || 'eemd' == editor_cookie ) {
		jQuery('#content-eemd').trigger('click');
	}
    setTimeout(function () {
        if (  'markdown' == editor_cookie || 'eemd' == editor_cookie ) {
			jQuery('#content-eemd').trigger('click');
		} 
    }, 250);
        
});

/* ==========================================================
	End of EpicEditor-for-WordPress
============================================================= */