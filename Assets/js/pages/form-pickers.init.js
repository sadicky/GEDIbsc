$(document).ready(function(){
    $("#timepicker").timepicker({defaultTIme:!1,icons:{
        up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"}}),
    $("#timepicker2").timepicker({showMeridian:!1,icons:{
        up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"}}),
    $("#timepicker3").timepicker({minuteStep:15,icons:{
        up:"mdi mdi-chevron-up",down:"mdi mdi-chevron-down"}}),
    $(".colorpicker-default").colorpicker({format:"hex"}),
    $(".colorpicker-rgba").colorpicker(),
    $(".clockpicker").clockpicker({donetext:"Done"}),
    $("#single-input").clockpicker({placement:"bottom",align:"left",autoclose:!0,default:"now"}),
    $("#check-minutes").click(function(e){e.stopPropagation(),
    $("#single-input").clockpicker("show").clockpicker("toggleView","minutes")}),
    $(".input-daterange-datepicker").daterangepicker({buttonClasses:["btn","btn-sm"],applyClass:"btn-success",cancelClass:"btn-light"})
        ,$(".input-daterange-timepicker").daterangepicker({timePicker:!0,timePickerIncrement:30,
            locale:{format:"MM/DD/YYYY h:mm A"},
            buttonClasses:["btn","btn-sm"],
            applyClass:"btn-success",
            cancelClass:"btn-light"}),
            $(".input-limit-datepicker").daterangepicker({
                format:"MM/DD/YYYY",
                minDate:"06/01/2018",
                maxDate:"06/30/2018",
                buttonClasses:["btn","btn-sm"],
                applyClass:"btn-success",
                cancelClass:"btn-light",
                dateLimit:{days:6}}),
                $("#reportrange span").html(moment().
                subtract(29,"days").format("MMMM D, YYYY")+" - "+moment().
                format("MMMM D, YYYY")),
                $("#reportrange").daterangepicker({format:"MM/DD/YYYY",startDate:moment().
                subtract(29,"days"),endDate:moment(),minDate:"01/01/2012",maxDate:"12/31/2015",
                dateLimit:{days:60},showDropdowns:!0,showWeekNumbers:!0,timePicker:!1,
                timePickerIncrement:1,timePicker12Hour:!0,ranges:{Today:[moment(),moment()],
                    Yesterday:[moment().subtract(1,"days"),moment().subtract(1,"days")],
                    "Last 7 Days":[moment().subtract(6,"days"),moment()],"Last 30 Days":
                    [moment().subtract(29,"days"),moment()],
                    "This Month":[moment().startOf("month"),moment().endOf("month")],
                    "Last Month":[moment().subtract(1,"month").startOf("month"),
                    moment().subtract(1,"month").endOf("month")]},opens:"left",drops:"down",
                    buttonClasses:["btn","btn-sm"],applyClass:"btn-success",cancelClass:"btn-default",
                    separator:" to ",locale:{applyLabel:"Submit",cancelLabel:"Cancel",
                    fromLabel:"From",toLabel:"To",customRangeLabel:"Custom",
                    daysOfWeek:["Su","Mo","Tu","We","Th","Fr","Sa"],
                    monthNames:["January","February","March","April","May","June","July","August",
                    "September","October","November","December"],firstDay:1}},
                    function(e,t,n){console.log(e.toISOString(),t.toISOString(),n),
                        $("#reportrange span").html(e.format("MMMM D, YYYY")+" - "+
                        t.format("MMMM D, YYYY"))})});