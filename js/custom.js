$(document).ready(function() {
    
    /**
     * Loop That Populates Date Picker in page-register.php
     */
    var currentYear = new Date().getFullYear();
    var initialYear = currentYear - 100;

    
    while ( initialYear !== currentYear) {
        $('#datePicker').append(
                    $("<option></option>").attr("value", initialYear).text(initialYear)     
                );
        initialYear++;    
    }
    
    /**
     * Implement a date picker in an add post page
     */
    $("#chooseDate").datepicker();
    
    
    /**
     * Dynamic profile settings
     */
    $("#profile-form").submit(function(ev) {
        ev.preventDefault();
        $("input:disabled").prop('disabled', false);
        $(".profile-update").attr('Value', 'Save changes');
        $(this).unbind('submit');
        }); //end submit           
    
});//end ready