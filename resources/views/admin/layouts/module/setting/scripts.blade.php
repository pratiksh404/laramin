<script>
    $(function(){
        $('.tagging').select2({
            dropdownAutoWidth: true,
            width: '100%',
            tags: true,
            tokenSeparators: [',']
            });

        $('.slogans').select2({
            dropdownAutoWidth: true,
            width: '100%',
            tags: true,
            tokenSeparators: [',']
            });
    });
</script>
<script>
    function readLogoURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#logo_placeholder')
                .attr('src',e.target.result)
                .width(64).height(64)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }
    function readFaviconURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#favicon_placeholder')
                .attr('src',e.target.result)
                .width(64).height(64)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }
    function readOGImageURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#og_image_placeholder')
                .attr('src',e.target.result)
                .width(120).height(80)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }
    function readBannerURL(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#banner_image').hide();
            $('#banner_image_plcaeholder')
                .attr('src',e.target.result)
                .width(192).height(128)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }

    ClassicEditor
    .create( document.querySelector( '.discription' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '.og_discription' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '.excerpt' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '.about_us' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '.why_us' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '.at_resort' ) )
    .then( editor => {
    console.log( editor );
    } )
    .catch( error => {
    console.error( error );
    } );
</script>