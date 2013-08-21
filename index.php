<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="fileuploader.css" rel="stylesheet" type="text/css">	
    <script src="jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="fileuploader.js" type="text/javascript"></script>    
</head>
<body>		
    <div align='center'>
        <div align='center'><h1>Ajax-File-Uploader</h1></div>
    	<div id="file-uploader-demo1">		
    		<noscript>			
    			<p>Please enable JavaScript to use file uploader.</p>
    			<!-- or put a simple form for upload here -->
    		</noscript>         
    	</div>
    	<div class="qq-upload-extra-drop-area">Drop files here too</div>
        <textarea id='uploaded_file_names_element'>Uploaded File Names</textarea>
    </div>

    
    <script>   
        var UPLOADED_FILES_NAMES = new Array();     
        function createUploader(){            
            var uploader = new qq.FileUploader({
                element: document.getElementById('file-uploader-demo1'),
                action: 'upload.php',
                debug: true,
                allowedExtensions: Array("pdf","doc","docx","xls","xlsx","jpg","jpeg","png","gif"),
                extraDropzones: [qq.getByClass(document, 'qq-upload-extra-drop-area')[0]],

                onSubmit: function(id, fileName){
                    //alert(fileName);
                },
                onComplete: function(id, fileName, responseJSON){

                    var filename = responseJSON.filename;
                    if(responseJSON.success){
                      UPLOADED_FILES_NAMES.push(filename);   
                    }
                    $('#uploaded_file_names_element').val(UPLOADED_FILES_NAMES); 
                }        
            });           
        }
        
        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load  
        window.onload = createUploader;     
    </script>    
</body>
</html>