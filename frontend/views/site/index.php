<?php
/* @var $this yii\web\View */
$this->title = 'Contact list DEMO!';
?>
<div class="site-index">

    <div class="main-links">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                            <a href="/index" class="active">All contacts</a>&nbsp;|&nbsp;<a href="/my-favorite">My favorites</a>
            </div>
            <div class="col-md-4">
            </div>

        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <input type="text" size="100" placeholder="Type contact name here..." id="searchValue" autocomplete="off"/>
            </div>
        </div>

    </div>

    <div class="body-content">

        <div class="row" id="contact-list">

        </div>

    </div>
</div>
<script>
<?php
    $this->registerJs( <<< EOT_JS_CODE
    $(function(){
        $('#searchValue').on('keydown',function(value){
            console.log();
            $.getJSON( "http://api.contact-list.loc:8080/contact/search",
            {
                searchValue: $(this).val(),
            },
            function( data ) {
                var items = [];
                $.each( data, function( key, val ) {
                    items.push( "<div class='col-md-4' id='" + key + "'><strong>" + val.first_name + ' ' + val.last_name + "</strong></div>" );
                });

                $('#contact-list').html(items.join( "" ));

            });

        });
    })
EOT_JS_CODE
);
?>
</script>
