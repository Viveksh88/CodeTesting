define('js/theme', [
    'jquery',
    'domReady!'
], function ($) {
    'use strict';
    $('#page_trigger_type').change(function(){
        $("#page_trigger_type").each(function() {                                             
            if($("#page_trigger_type").val() == 1 || $("#page_trigger_type").val() == ""){
                $(".field-custom_period").hide();
            }
        });
        $("#page_schedule_event").each(function() {                                             
            if($("#page_schedule_event").val() == 6 && $("#page_trigger_type").val() == 2){
                $(".field-custom_period").show();
            }
        });
    });
});