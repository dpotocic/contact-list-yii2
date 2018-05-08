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

        <br />

        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" id="addNewContact" onclick="$('#add-new-container').show();">Add new</button>
            </div>

            <div id="add-new-container"  class="col-md-12" style="display: none;">
                <form id="add-new-form">
                    <div class="form-group">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" id="first_name" placeholder="Enter contact first name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" id="last_name" placeholder="Enter contact last name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter contact email" required="required">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn" onclick="$('#add-new-container').hide();">Cancel</button>
                </form>
            </div>
        </div>

        <br />

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
        $('#searchValue').on('keyup',function(value){
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
    $('#add-new-form').on('submit', function(event) {
            $.ajax({
                url: 'http://api.contact-list.loc:8080/contact/create',
                type: 'POST',
                contentType: 'application/x-www-form-urlencoded',
                data: { "first_name": $('#first-name').val(), "last_name": $('#last-name').val(), "email": $('#email').val() },

                success: function( data, textStatus, jQxhr ){
                    $('#add-new-container').hide();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            return false;
    });
EOT_JS_CODE
);
?>
</script>
