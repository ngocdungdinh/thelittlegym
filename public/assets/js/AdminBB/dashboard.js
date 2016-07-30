/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function() {
    "use strict";

    //Make the dashboard widgets sortable Using jquery UI
    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header, .nav-tabs",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();
    
    // $(".box-header, .nav-tabs").css("cursor","move");
    //jQuery UI sortable for the todo list
    $(".todo-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    }).disableSelection();;

    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
    // $('.daterange').daterangepicker(
    //         {
    //             ranges: {
    //                 'Today': [moment(), moment()],
    //                 'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
    //                 'Last 7 Days': [moment().subtract('days', 6), moment()],
    //                 'Last 30 Days': [moment().subtract('days', 29), moment()],
    //                 'This Month': [moment().startOf('month'), moment().endOf('month')],
    //                 'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
    //             },
    //             startDate: moment().subtract('days', 29),
    //             endDate: moment()
    //         },
    // function(start, end) {
    //     alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    // });

    /* jQueryKnob */
    $(".knob").knob();


    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear();

    //Calendar
    $('#calendar').fullCalendar({
        editable: true, //Enable drag and drop
        events: [
            {
                title: 'All Day Event',
                start: new Date(y, m, 1),
                backgroundColor: "#3c8dbc", //light-blue 
                borderColor: "#3c8dbc" //light-blue
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d - 5),
                end: new Date(y, m, d - 2),
                backgroundColor: "#f39c12", //yellow
                borderColor: "#f39c12" //yellow
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false,
                backgroundColor: "#0073b7", //Blue
                borderColor: "#0073b7" //Blue
            },
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false,
                backgroundColor: "#00c0ef", //Info (aqua)
                borderColor: "#00c0ef" //Info (aqua)
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d + 1, 19, 0),
                end: new Date(y, m, d + 1, 22, 30),
                allDay: false,
                backgroundColor: "#00a65a", //Success (green)
                borderColor: "#00a65a" //Success (green)
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/',
                backgroundColor: "#f56954", //red
                borderColor: "#f56954" //red
            }
        ],
        buttonText: {//This is to add icons to the visible buttons
            prev: "<span class='fa fa-caret-left'></span>",
            next: "<span class='fa fa-caret-right'></span>",
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        header: {
            left: 'title',
            center: '',
            right: 'prev,next'
        }
    });

    //SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').slimScroll({
        height: '250px'
    });

    $('#comments-box').slimScroll({
        height: '300px'
    });

    $('#activities-box').slimScroll({
        height: '320px'
    });

    // /* Morris.js Charts */
    // // Sales chart
    // var area = new Morris.Area({
    //     element: 'revenue-chart',
    //     resize: true,
    //     data: [
    //         {y: '2011 Q1', item1: 2666, item2: 2666},
    //         {y: '2011 Q2', item1: 2778, item2: 2294},
    //         {y: '2011 Q3', item1: 4912, item2: 1969},
    //         {y: '2011 Q4', item1: 3767, item2: 3597},
    //         {y: '2012 Q1', item1: 6810, item2: 1914},
    //         {y: '2012 Q2', item1: 5670, item2: 4293},
    //         {y: '2012 Q3', item1: 4820, item2: 3795},
    //         {y: '2012 Q4', item1: 15073, item2: 5967},
    //         {y: '2013 Q1', item1: 10687, item2: 4460},
    //         {y: '2013 Q2', item1: 8432, item2: 5713}
    //     ],
    //     xkey: 'y',
    //     ykeys: ['item1', 'item2'],
    //     labels: ['Item 1', 'Item 2'],
    //     lineColors: ['#a0d0e0', '#3c8dbc'],
    //     hideHover: 'auto'
    // });
    //Donut Chart
    // var donut = new Morris.Donut({
    //     element: 'sales-chart',
    //     resize: true,
    //     colors: ["#3c8dbc", "#f56954", "#00a65a"],
    //     data: [
    //         {label: "Download Sales", value: 12},
    //         {label: "In-Store Sales", value: 30},
    //         {label: "Mail-Order Sales", value: 20}
    //     ],
    //     hideHover: 'auto'
    // });
    // //Bar chart
    // var bar = new Morris.Bar({
    //     element: 'bar-chart',
    //     resize: true,
    //     data: [
    //         {y: '2006', a: 100, b: 90},
    //         {y: '2007', a: 75, b: 65},
    //         {y: '2008', a: 50, b: 40},
    //         {y: '2009', a: 75, b: 65},
    //         {y: '2010', a: 50, b: 40},
    //         {y: '2011', a: 75, b: 65},
    //         {y: '2012', a: 100, b: 90}
    //     ],
    //     barColors: ['#00a65a', '#f56954'],
    //     xkey: 'y',
    //     ykeys: ['a', 'b'],
    //     labels: ['CPU', 'DISK'],
    //     hideHover: 'auto'
    // });
    //Fix for charts under tabs
    $('.box ul.nav a').on('shown.bs.tab', function(e) {
        area.redraw();
        donut.redraw();
    });

    /* The todo list plugin */
    $(".todo-list").todolist({
        onCheck: function(ele) {
            //console.log("The element has been checked")
        },
        onUncheck: function(ele) {
            //console.log("The element has been unchecked")
        }
    });

});