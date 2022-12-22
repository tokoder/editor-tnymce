<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editor TinyMCE</title>

	<script src="tinymce/js/tinymce/tinymce.min.js"></script>
	<script>
		const base_url = 'tinymce/js/tinymce';
		const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
		const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

		tinymce.init({
			base_url: base_url,
			selector: 'textarea.editor',
			height: 600,
			language: 'id',
			plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
			toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
			editimage_cors_hosts: ['picsum.photos'],
			menubar: 'file edit view insert format tools table help',
			toolbar_sticky: true,
			toolbar_sticky_offset: isSmallScreen ? 102 : 108,
			autosave_ask_before_unload: true,
			autosave_interval: '30s',
			autosave_prefix: '{path}{query}-{id}-',
			autosave_restore_when_empty: false,
			autosave_retention: '2m',
			image_advtab: true,
			link_list: [
				{ title: 'My page 1', value: 'https://www.tiny.cloud' },
				{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_list: [
				{ title: 'My page 1', value: 'https://www.tiny.cloud' },
				{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_class_list: [
				{ title: 'None', value: '' },
				{ title: 'Some class', value: 'class-name' }
			],
			importcss_append: true,
			file_picker_callback: (callback, value, meta) => {
				/* Provide file and text for the link dialog */
				if (meta.filetype === 'file') {
				callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
				}

				/* Provide image and alt text for the image dialog */
				if (meta.filetype === 'image') {
				callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
				}

				/* Provide alternative source and posted for the media dialog */
				if (meta.filetype === 'media') {
				callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
				}
			},
			templates: [
				{ title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
				{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
				{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
			],
			template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
			template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
			image_caption: true,
			quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
			noneditable_class: 'mceNonEditable',
			toolbar_mode: 'sliding',
			contextmenu: 'link image table',
			skin: useDarkMode ? 'oxide-dark' : 'oxide',
			content_css: useDarkMode ? 'dark' : 'default',
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
		});
	</script>
</head>
<body>
	<h1>TinyMCE 6.3.1</h1>
	<form action="" method="post">
		<textarea name="content" class="editor" cols="30" rows="10"></textarea>
	</form>
</body>
</html>