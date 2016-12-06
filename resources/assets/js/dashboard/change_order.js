function saveOrder(tkn, table)
{
    console.log(tkn, table)
    let order = {};

    $( ".sort-item" ).each(function(key) {
        order[parseInt($(this).attr('id'))] = key + 1;
    });

    $.ajaxSetup({
        headers:
        {
            'X-CSRF-TOKEN': tkn
        }
    });

    $.ajax({
        type: 'post',
        url: 'change-list-order',
        data: {
            order: order,
            table: table
        },
        success: function (response) {
            if(response){
                alert('Sikeresen megváltoztattas a menü sorrendjét');
                //swal({
                //    title: 'Siker',
                //    text: "A sorrend megváltozott",
                //    type: 'success',
                //    buttonsStyling: true
                //})
            }
        }
    });

}

$(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        listType: "ul",
        toleranceElement: '> div',
        //disableNesting: "no-nest",
        maxLevels: 1,
        excludeRoot : false,
        update : function()
        {
            var oU = $(this).attr("data-onChange"); // oU = on update :)
            if(oU !='')
            {
                eval(oU);
            }
        }
    });

});
