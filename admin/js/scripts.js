$(document).ready(function() {

	// EDITOR CKEDITOR
    ClassicEditor.create( document.querySelector( '#body' ), {
        alignment: {
            options: [ 'left', 'right' ]
        },
        toolbar: [
            'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
        ]
    } )
        .then( editor => {
            window.editor1 = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

    ClassicEditor.create( document.querySelector( '#body2' ) )
        .then( editor => {
            window.editor2 = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

    ClassicEditor.create( document.querySelector( '#body3' ) )
        .then( editor => {
            window.editor2 = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );

    ClassicEditor.create( document.querySelector( '#body4' ) )
        .then( editor => {
            window.editor2 = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );


    // SELECT OR DESELECT CHECKBOXES
    $('#selectAllBoxes').click(function(event) {
    	if(this.checked) {
    		$('.checkBoxes').each(function() {
    			this.checked = true;
    		});
    	} else {
    		$('.checkBoxes').each(function() {
    			this.checked = false;
    		});
    	}

    });   

    // ADMIN LOADER
    // var div_box = "<div id='load-screen'><div id='loading'></div></div>"; 
    // $("body").prepend(div_box);
    // $('#load-screen').delay(700).fadeOut(600, function() {
    //     $(this).remove();
    // });


});

