<?php
/**
Blog Booster Editor v.1.0.0
@Proxtrasoft v.1.0.0
@license	: GNU Lesser General Public License v3.0 AND Halal Open Project License
@author		: Abu Zidane Asadudin Shakir Al-Jabary
**/
?>
<textarea type="text" class="form-control " name="bc_editor_<?php echo $data['selector'];?>" id="<?php echo $data['selector'];?>"  ><?php echo $data['content'];?></textarea>
 
 <script>tinymce.init({
  selector: '#<?php echo $data['selector'];?>',
  height: <?php echo $data['height'];?>,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
    imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],

  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
 });
 /**
 * get content the editor via javascript
 * tinymce.activeEditor.getContent();
 * insert content into editor
 * tinymce.activeEditor.insertContent();
 */ 
 </script>     
				