<?php 
//Component
global $data;
$ga = isset($data['enable_ga']) && $data['enable_ga'] == true ;
$ct = isset($data['enable_call_tracking']) && $data['enable_call_tracking'] == true ;
?>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-timeago" src="https://cdn.ampproject.org/v0/amp-timeago-0.1.js"></script>            
<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
<script async custom-element="amp-image-lightbox" src="https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js"></script>
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<script async custom-element="amp-audio" src="https://cdn.ampproject.org/v0/amp-audio-0.1.js"></script>
<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>

<?php if ($ga || $ct){ ?>
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script> 
<?php } ?>
<?php if ($ct): ?>
<script async custom-element="amp-call-tracking" src="https://cdn.ampproject.org/v0/amp-call-tracking-0.1.js"></script>
<?php endif; ?>
<?php if (isset($data['component'])) echo $data['component']; ?>
