jQuery(document).ready(function ($)
{
    // convert datatable
    var datatable = $("#table_export").dataTable({
        "sPaginationType": "bootstrap",
        "sDom": 'T<"clear">lfrtip',
                "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>",
    });

    $(".DTTT").css("float" , "right");
    $(".DTTT").css("margin" , "13px");
    //customize the select menu
    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });
});