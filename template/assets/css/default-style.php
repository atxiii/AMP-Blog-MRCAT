<?php
global $data;
$data = (get_option('amp_mrcat_form') !== null) ? get_option('amp_mrcat_form') : '';
?>
<?php if (isset($data['enable_new_css']) && $data['enable_new_css'] == true) {
    ob_start('minifyCss');
    if (isset($data['new_css'])) echo $data['new_css'];
    ob_end_flush();
} else {
    ob_start('minifyCss');
    ?>
    :root {
    --primary-color: <?php if (isset($data['primary-color'])) {
        echo $data['primary-color'];
    } else {
        echo "#051AFF";
    } ?>;
    --secondary-color:<?php if (isset($data['secondary-color'])) {
        echo $data['secondary-color'];
    } else {
        echo "#F43636";
    } ?>;
    --hf-bg-color: <?php if (isset($data['hf_bg_color'])) {
        echo $data['hf_bg_color'];
    } else {
        echo "#fff";
    } ?>;
    --hf-font-color: <?php if (isset($data['hf_font_color'])) {
        echo $data['hf_font_color'];
    } else {
        echo "#fff";
    } ?>;
    --bg-top-sidebar:<?php if (isset($data['bg_color_top_sidebar'])) {
        echo $data['bg_color_top_sidebar'];
    } else {
        echo "#f8f8f8";
    } ?>;
    --color-sidebar:<?php if (isset($data['font_color_sidebar'])) {
        echo $data['font_color_sidebar'];
    } else {
        echo "#333";
    } ?>;
    --body-color-sidebar:<?php if (isset($data['body_color_sidebar'])) {
        echo $data['body_color_sidebar'];
    } else {
        echo "#fff";
    } ?>;

    --a-color:<?php if (isset($data['a_color'])) {
        echo $data['a_color'];
    } else {
        echo "#367cf1";
    } ?>;
    --gray: #eeede9;
    --gray-lighten: #f8f8f8;
    --blue: #367cf1;
    --yellow: #fbb718;
    --red: #f02;
    --base-size: 1rem;
    --font-r: 'Open Sans', sans-serif;
    --font-b: 'Open Sans bold', sans-serif;
    --breakpoint: 768px;
    --breakpoint-sm: 1024px;
    --margin-page: 7%
    }
    body,
    html {
    font-size: 20px;
    margin: 0;
    padding: 0;
    font-family: var(--font-r)
    }
    .bold,
    b,
    strong {
    font-family: var(--font-b);
    }
    h1,
    h2,
    h3,
    h4,
    strong {
    font-family: var(--font-b);
    margin-top:1em;
    margin-bottom:1em;
    }
    p,tr{
    line-height:1.5;
    }
    p,main li{
    margin-bottom:1em;
    word-break: break-word;
    line-height: 1.5;
    }
    br{
    line-height: 2;
    }
    :focus {
    outline: 0
    }
    span{
    word-break: break-word;
    }
    ol,
    ul {
    list-style: none
    }

    * {
    margin: 0;
    padding: 0;
    outline: 0
    }

    *,
    ::after,
    ::before {
    box-sizing: border-box
    }

    .container,
    .m-page,
    .margin-left-page {
    margin-left: var(--margin-page)
    }

    .container,
    .m-page,
    .margin-right-page {
    margin-right: var(--margin-page)
    }

    .border-radius-top{
    border-radius: 30px 30px 0 0;
    }
    @media screen and (max-width:768px){
    .w-img{
    margin:auto calc(-1.2*(var(--margin-page)));
    }
    }
    @media screen and (min-width:1024px) {
    .m-sm-page>.m-page {
    margin: auto 0
    }

    .m-sm-page {
    margin-right: var(--margin-page);
    margin-left: var(--margin-page)
    }

    .p-sm-page,
    .pl-sm-page {
    padding-left: calc(var(--margin-page)*.5)
    }

    .p-sm-page,
    .pr-sm-page {
    padding-right: calc(var(--margin-page)*.5)
    }
    }

    @media screen and (max-width:1024px) {
    .p-page {
    padding-left: var(--margin-page);
    padding-right: var(--margin-page)
    }
    }

    .col-12 {
    flex: 1 1 100%;
    max-width: 100%;
    }
    @media screen and (min-width:1024px) {
    .col-12 {
    flex: 0 0 100%;
    max-width: 600px;
    }
    .col-sm-6 {
    flex: 0 0 50%;
    max-width: 50%
    }
    .featured-image {
    display:inline;
    }
    figure{
    display:flex;
    }
    }

    a {
    text-decoration: none;
    color: var(--a-color);
    }

    .my-auto {
    margin-left: auto;
    margin-right: auto
    }

    .mb-2,
    .my-2,
    p {
    margin-bottom: var(--base-size)
    }

    .mt-2,
    .my-2 {
    margin-top: var(--base-size)
    }

    @media (max-width:1024px) {

    .mt-5,
    .my-5 {
    margin-top: calc(var(--base-size)*3)
    }

    .mb-5,
    .my-5 {
    margin-bottom: calc(var(--base-size)*3)
    }
    }

    .mt-5,
    .my-5 {
    margin-top: calc(var(--base-size)*3)
    }

    .mb-5,
    .my-5 {
    margin-bottom: calc(var(--base-size)*3)
    }

    @media screen and (max-height:570px) {

    .mb-5,
    .my-5 {
    margin-bottom: calc(var(--base-size)*1.5)
    }

    .mt-5,
    .my-5 {
    margin-top: calc(var(--base-size)*1.5)
    }

    .panel .table-fixed td {
    font-size: .6em;
    display: contents
    }
    }

    .mt-3,
    .my-3 {
    margin-top: calc(var(--base-size)*1.5)
    }

    .mb-3,
    .my-3 {
    margin-bottom: calc(var(--base-size)*1.5)
    }

    .pt-5,
    .py-5 {
    padding-top: calc(var(--base-size)*3)
    }

    .pb-5,
    .py-5 {
    padding-bottom: calc(var(--base-size)*3)
    }

    .py-1 {
    padding-bottom: calc(var(--base-size)*.5);
    padding-top: calc(var(--base-size)*.5)
    }

    .pt-2,
    .py-2 {
    padding-top: calc(var(--base-size))
    }

    .pb-2,
    .py-2 {
    padding-bottom: calc(var(--base-size))
    }

    @media screen and (max-width:320px) {

    .pt-2,
    .py-2 {
    padding-top: calc(var(--base-size)*.6)
    }

    .pb-2,
    .py-2 {
    padding-bottom: calc(var(--base-size)*.6)
    }
    }

    .pt-3,
    .py-3 {
    padding-top: calc(var(--base-size)*1.5)
    }

    .pb-3,
    .py-3 {
    padding-bottom: calc(var(--base-size)*1.5)
    }

    .d-flex,
    .row {
    display: flex
    }

    .flex-col {
    flex-direction: column
    }

    .flex-wrap,
    .row {
    flex-wrap: wrap
    }

    .align-items-center {
    align-items: center
    }

    .justify-content-center {
    justify-content: center
    }

    .shadow {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)
    }

    .header {
    position: relative;
    overflow: hidden
    }

    .title {
    background-color: #000;
    color: #fff
    }

    .parallax-image-window {
    overflow: hidden
    }

    .parallax-image-window amp-img {
    margin-bottom: -20%
    }

    .burger {
    border: none;
    font-size: 28px;
    color: <?php echo isset($data['hamburger_color']) ? $data['hamburger_color'] : "#222" ?>;
    background-color: transparent;
    }

    amp-img.cover img {
    object-fit: cover
    }
    .w-img amp-img>img{
    object-fit: cover
    }
    .w-img amp-img{
    margin-left:auto;
    margin-right:auto;
    }

    .mask {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: .6;
    background-image: none;
    background-color: #000;
    z-index: 1
    }

    #sidebar {
    max-width: 250px;
    width: 250px;
    background: var(--body-color-sidebar);
    color: var(--color-sidebar);
    }

    .sidebar-header {
    background: var(--bg-top-sidebar);
    padding: 8px;
    }

    .btn-dismiss {
    border: none;
    background: 0 0;
    display: inherit;
    }

    [side=left] .btn-dismiss::before {
    top: 10px;
    right: 10px;
    position: absolute;
    text-align: right;
    content: '‹';
    display: inline;
    font-size: 30px
    }
    [side=right] .btn-dismiss::before {
    top: 10px;
    left: 10px;
    position: absolute;
    text-align: right;
    content: '›';
    display: inline;
    font-size: 30px
    }
    .title-accordion {
    padding: calc(var(--base-size)*.5);
    display: block
    }
    .time-article time{
    font-size: 18px;
    color: #a9a9a9;
    }
    a.title-accordion {
    color:var(--color-sidebar);
    }

    .border-0 {
    border: none
    }

    .ampstart-dropdown>section>header:after {
    display: inline-block;
    content: "+";
    padding: 0 0 0 calc(var(--base-size)*1.5);
    color: #222;
    position: absolute;
    right: 30px
    }

    .bg-f8 {
    background: var(--gray-lighten)
    }

    .bg-w {
    background: #fff
    }

    .bg-primary {
    background-color: var(--primary-color)
    }

    .bg-gray {
    background-color: var(--gray)
    }

    .bg-blue {
    background-color: var(--blue)
    }

    .txt-primary {
    color: var(--primary-color)
    }
    .txt-secondary{
    color:var(--secondary-color);
    }
    .txt-w {
    color: #fff
    }

    .txt-center {
    text-align: center
    }

    .l-h-1-5,
    p {
    line-height: 1.5
    }

    .position-absolute {
    position: absolute
    }

    .z-2 {
    z-index: 2
    }

    .top-0 {
    top: 0
    }

    .bottom-0 {
    bottom: 0
    }

    .left{
    left: 0
    }

    .right{
    right: 0
    }

    .h100p {
    height: 100%
    }

    .w100 {
    width: 100vw
    }

    .sh-b-primary:after {
    box-shadow: 0 .06em 0 .03em var(--primary-color);
    display: flex;
    width: 15%;
    margin: 5px auto 20px;
    content: ""
    }

    .f-1-5 {
    font-size: calc(var(--base-size)*1.5)
    }

    .f-2 {
    font-size: calc(var(--base-size)*2)
    }

    .f-1 {
    font-size: var(--base-size)
    }

    .circle img {
    border-radius: 50%
    }

    .circle {
    border: 4px solid var(--gray-lighten);
    border-radius: 50%
    }

    .w150px {
    width: 150px
    }

    .w75px {
    width: 75px
    }

    .btn-primary {
    height: 3.2em;
    line-height: 3em;
    width: 12.22em;
    border-radius: 1.8755em;
    text-align: center;
    display: inline-block;
    font-size: 18px;
    letter-spacing: .02rem;
    border: 2px solid var(--primary-color);
    font-weight: 800
    }

    .container,
    .d-block {
    display: block
    }

    .m-0,
    .ml-0 {
    margin-left: 0
    }

    .m-0,
    .mr-0 {
    margin-right: 0
    }

    .mt-auto,
    .my-auto {
    margin-top: auto
    }

    .mb-auto,
    .my-auto {
    margin-bottom: auto
    }

    .mr-auto,
    .mx-auto {
    margin-right: auto
    }

    .ml-auto,
    .mx-auto {
    margin-left: auto
    }

    .mr-1 {
    margin-right: calc(var(--base-size)*.5)
    }

    .ml-1 {
    margin-left: calc(var(--base-size)*.5)
    }

    .mr-2,
    .mx-2 {
    margin-right: calc(var(--base-size)*2)
    }

    .ml-2,
    .mx-2 {
    margin-left: calc(var(--base-size)*2)
    }

    @media screen and (min-width:1024px) {

    .mr-sm-2,
    .mx-sm-2 {
    margin-right: calc(var(--base-size)*2)
    }

    .ml-sm-2,
    .mx-sm-2 {
    margin-left: calc(var(--base-size)*2)
    }
    }

    .line-sep span {
    width: 80%;
    background-color: #dedcd5;
    height: .0625em;
    position: absolute;
    left: 0;
    right: 0;
    display: block;
    margin: 0 auto;
    top: 50%
    }

    .position-relative {
    position: relative
    }

    .bg-y {
    background-color: var(--yellow)
    }

    .sm-font {
    font-size: calc(var(--base-size)*.8125)
    }

    .txt-sub {
    color: var(--primary-color)
    }

    .ver-mid {
    vertical-align: middle
    }

    @media screen and (max-width:480px) {
    .footer-details {
    flex-flow: column
    }

    .footer-details>.mr-2 {
    margin-left: auto;
    margin-right: auto;
    display: block
    }

    .footer-details amp-call-tracking .ml-2 {
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    display: block
    }
    }

    @media screen and (min-width:1024px) {
    .order-sm-1 {
    order: 1
    }

    .col-flex-3 {
    flex: 1 1 30%
    }
    }

    input[type=email],
    input[type=text] {
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    width: 100%;
    height: 50px;
    background-color: #f8f8f8;
    border: none;
    color: #505558;
    line-height: 1;
    padding: 0 0 0 20px;
    margin-bottom: 20px;
    margin: 5px auto;
    font-size: 16px
    }
    .lightbox {
    display: flex;
    background: rgba(0, 0, 0, .6);
    height: 100%;
    width: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    position: relative;
    justify-content: center;
    align-items: center
    }
    .setUpForm {
    background: #fff;
    border-radius: 10px;
    min-height: 300px;
    width: 95%;
    padding: 7% 10%
    }

    .dismiss {
    margin-left: auto;
    display: flex;
    height: 48px;
    width: 48px;
    text-align: center;
    align-items: center;
    justify-content: center;
    background: #f8f8f8
    }
    .msg-error {
    font-size: 16px;
    display: block;
    }

    .error {
    color: var(--red)
    }

    .success {
    color: var(--primary-color)
    }

    .avatar{
    flex: 0 0 64px;
    max-width: 64px;
    text-align:center;
    }
    .name-avatar{
    font-size:14px;
    }
    @media screen and (min-width:1024px){
    .wrap{
    display: block;
    margin: auto;
    max-width: 50%;
    width: 600px;
    }
    }
    ul.post-categories {
    display: inline-block;
    }

    .btn-comment{
    height: 3.2em;
    line-height: 3em;
    width: 12.22em;
    text-align: center;
    display: inline-block;
    font-size: 18px;
    letter-spacing: .02rem;
    border: 2px solid var(--primary-color);
    font-weight: 800;
    display: block;
    width: 100%;
    }
    .arrow-size{
    font-size: 40px;
    line-height: 35px;
    }
    @media screen and (max-width:768px){
    .prev-blog,.next-blog{
    flex: 0 0 auto;
    max-width: 45%;
    font-size:15px;
    padding: 10px;
    border-radius: 5px;
    }
    }
    .prev-blog,.next-blog{
    flex: 0 0 auto;
    max-width: 45%;
    padding: 10px;
    }
    .next-blog{
    text-align:right;
    }
    .sticky-top{
    <?php if (isset($data['sticky_top']) && $data['sticky_top'] == true) echo "position:sticky;"; ?>
    top: -1px;
    z-index: 99;
    background-color:var(--hf-bg-color);
    color:var(--hf-font-color);
    }
    footer{
    padding-top:2rem;
    padding-bottom:0;
    }
    .footer-bottom{
        color:var(--hf-font-color);
        background-color: var(--hf-bg-color);
        text-align: center;
        padding: 20px;
        margin-top: 50px;
        font-size: 14px;
    }

    ol#breadcrumbs li {
        display:inline;
    }
    ol#breadcrumbs li a {
    font-size: 15px;
    color  :var(--blue);
    }
    ol#breadcrumbs li {
    font-size: 14px;
    }

    .menu-color {
        background: var(--hf-bg-color);
        border: none;
        border-bottom: 1px solid #222;
        color: var(--hf-font-color);
    }

    table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
    }

    table caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
    }

    table tr {
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    padding: .35em;
    }

    table th,
    table td {
    padding: .625em;
    text-align: center;
    }

    table th {
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
    table {
    border: 0;
    }

    table caption {
    font-size: 1.3em;
    }

    table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
    }

    table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
    }

    table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: center;
    }

    table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
    }

    table td:last-child {
    border-bottom: 0;
    }
    }

    <?php if (isset($data['enable_custom_css']) && $data['enable_custom_css'] == true) {
        if (isset($data['custom-css'])) echo $data['custom-css'];
    } ?>

    <?php ob_end_flush();
}
?>
<?php
function minifyCss($css)
{
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    // backup values within single or double quotes
    preg_match_all('/(\'[^\']*?\'|"[^"]*?")/ims', $css, $hit, PREG_PATTERN_ORDER);
    for ($i = 0; $i < count($hit[1]); $i++) {
        $css = str_replace($hit[1][$i], '##########' . $i . '##########', $css);
    }
    // remove trialing semicolon of selector's last property
    $css = preg_replace('/;[\s\r\n\t]*?}[\s\r\n\t]*/ims', "}\r\n", $css);
    // remove any whitespace between semicolon and property-name
    $css = preg_replace('/;[\s\r\n\t]*?([\r\n]?[^\s\r\n\t])/ims', ';$1', $css);
    // remove any whitespace surrounding property-colon
    $css = preg_replace('/[\s\r\n\t]*:[\s\r\n\t]*?([^\s\r\n\t])/ims', ':$1', $css);
    // remove any whitespace surrounding selector-comma
    $css = preg_replace('/[\s\r\n\t]*,[\s\r\n\t]*?([^\s\r\n\t])/ims', ',$1', $css);
    // remove any whitespace surrounding opening parenthesis
    $css = preg_replace('/[\s\r\n\t]*{[\s\r\n\t]*?([^\s\r\n\t])/ims', '{$1', $css);
    // remove any whitespace between numbers and units
    $css = preg_replace('/([\d\.]+)[\s\r\n\t]+(px|em|pt|%)/ims', '$1$2', $css);
    // shorten zero-values
    $css = preg_replace('/([^\d\.]0)(px|em|pt|%)/ims', '$1', $css);
    // constrain multiple white-spaces
    $css = preg_replace('/\p{Zs}+/ims', ' ', $css);
    // remove newlines
    $css = str_replace(array("\r\n", "\r", "\n"), '', $css);
    // Restore backup values within single or double quotes
    for ($i = 0; $i < count($hit[1]); $i++) {
        $css = str_replace('##########' . $i . '##########', $hit[1][$i], $css);
    }
    return $css;
}

?>