<?php

// Custom functions
add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">

        /* Webfonts */
        #custom_css textarea:focus, #custom_js textarea{
            transition: all .5s;
            -moz-transition: all .5s; /* Firefox 4 */
            -webkit-transition: all .5s; /* Safari and Chrome */
            -o-transition: all .5s; /* Opera */
            min-height: 120px;
        }

        #custom_css textarea:focus, #custom_js textarea:focus{
            font-family: "Ubuntu Mono", UbuntuMono, Consolas, Courier, mono;
            font-size: 16px;
            color: #ffffff;
            background-color: #292929;
            border-style: solid;
            border-left-width: 30px;
            border-top-width: 0;
            border-right-width: 0;
            border-bottom-width: 0;
        }

        #dash-right-now .main p {
            display: none;
        }

        #wp-admin-bar-comments {
            display: none;
        }

    </style>
<?php } ?>