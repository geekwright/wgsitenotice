<{if $block.infotext}>
<style>
#container-cookies-reg { 
    <{$block.position}>
    background: <{$block.bg_from}>; 
    background: -moz-linear-gradient(top, <{$block.bg_from}> 0%, <{$block.bg_to}> 100%); 
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<{$block.bg_from}>), color-stop(100%,<{$block.bg_to}>)); 
    background: -webkit-linear-gradient(top, <{$block.bg_from}> 0%,<{$block.bg_to}> 100%); 
    background: -o-linear-gradient(top, <{$block.bg_from}> 0%,<{$block.bg_to}> 100%);
    background: -ms-linear-gradient(top, <{$block.bg_from}> 0%,<{$block.bg_to}> 100%); 
    background: linear-gradient(to bottom, <{$block.bg_from}> 0%,<{$block.bg_to}> 100%); 
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<{$block.bg_from}>', endColorstr='<{$block.bg_to}>',GradientType=0 ); 
    opacity: <{$block.opacity}>;
    color:<{$block.color}>;
    line-height:<{$block.height}>px;
    outline: 1px solid #7b92a9; 
    text-align:right; 
    border-top:1px solid #fff;
    position:fixed; 
    left:0px;
    z-index:10000; 
    width:100%; 
    font-size:12px;
}
#container-cookies-reg a {
    color:<{$block.color}>;
    text-decoration:none;
    padding:3px;
}
#container-cookies-reg a:hover {text-decoration:underline;}
#container-cookies-reg div {padding:10px; padding-right:40px;}
#container-cookies-reg-text {padding-right:10px;}
#cookies-reg-closer {
   color: #777;
   font: 14px/100% arial, sans-serif;
   position: absolute;
   right: 20px;
   text-decoration: none;
   text-shadow: 0 1px 0 #fff;
   top: 30%;
   cursor:pointer;
   border-top:1px solid white; 
   border-left:1px solid white; 
   border-bottom:1px solid #7b92a9; 
   border-right:1px solid #7b92a9; 
   padding:4px;
   background: #ced6df; /* Old browsers */
   background: -moz-linear-gradient(top, #ced6df0%, #f2f6f9 100%); 
   background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ced6df), color-stop(100%,#f2f6f9)); 
   background: -webkit-linear-gradient(top, #ced6df0%,#f2f6f9 100%); 
   background: -o-linear-gradient(top, #ced6df0%,#f2f6f9 100%); 
   background: -ms-linear-gradient(top, #ced6df0%,#f2f6f9 100%); 
   background: linear-gradient(to bottom, #ced6df0%,#f2f6f9 100%); 
   filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ced6df', endColorstr='#f2f6f9',GradientType=0 ); 
 }
#cookies-reg-closer:hover {border-bottom:1px solid white; border-right:1px solid white; border-top:1px solid #7b92a9; border-left:1px solid #7b92a9;}
</style>

<div id="container-cookies-reg">
    <div>
        <span id="container-cookies-reg-text"><{$block.infotext}> (
            <{if $block.dataprotect_id}>
                <a href="<{xoAppUrl modules/wgsitenotice/index.php?version_id=}><{$block.dataprotect_id}>"><{$block.dataprotect_text}></a><{$block.seperator}>
            <{/if}>
            <{if $block.cookie_reg_id}>
                <a href="<{xoAppUrl modules/wgsitenotice/index.php?version_id=}><{$block.cookie_reg_id}>"><{$block.cookie_reg_text}></a>
            <{/if}>
        )</span>
        <span id="cookies-reg-closer" onclick="document.cookie = '<{$block.unique_id}>=1;path=/';jQuery('#container-cookies-reg').slideUp()">&#10006;</span>
    </div>
    
</div>

<script>
 if (document.cookie.indexOf('<{$block.unique_id}>=1') != -1) {
	jQuery('#container-cookies-reg').hide();
 } else {
	jQuery('#container-cookies-reg').prependTo('body');
	jQuery('#cookies-reg-closer').show();
 }
</script>
<{/if}>
