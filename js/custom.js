$(document).ready(function() {
    
    /*
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
    
    $("#chooseDate").datepicker();
    
    $(".profile-button").click(function() {
        var $this = $(this);
        $("input:disabled").prop('disabled', false);
        $this.text('Save profile');

    });//end click
    
});