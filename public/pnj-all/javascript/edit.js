$("body").on("click",".btn-edit", function(){
    $(this).parents('tr').find('th').html('<input  name="edit_th">');
    $(this).parents('tr').find('td').eq(0).html('<input name="edit_td1">');
    $(this).parents('tr').find('td').eq(1).html('<input name="edit_td2"><a id="btn-click" class="btn btn-outline btn-update"><i class="fas fa-check"></i></a>');
    $(this).hide();
});
$("body").on("click", ".btn-update", function () {
    var valth = $(this).parents('tr').find('th').find('input[name="edit_th"]').val();
    var valtd1 = $(this).parents('tr').find('td').eq(0).find('input[name="edit_td1"]').val();
    var valtd2 = $(this).parents('tr').find('td').eq(1).find('input[name="edit_td2"]').val();
    $(this).parents('tr').find('th').html('<span>' + valth + '</span>');
    $(this).parents('tr').find('td').eq(0).html('<span>' + valtd1 + '</span>');
    $(this).parents('tr').find('td').eq(1).html('<span>' + valtd2 + '</span><a class="btn btn-outline btn-edit"><i class="far fa-edit"></i></a>')
})
$("body").on("click", "#btn-add", function () {
    var content = '<tr class="flex-box body-tr"><th class="title-table-small"><input  name="edit_th"></th><td class="content-main-table" id="td1"><input  name="edit_td1"></td><td class="content-main-table" id="td2"><input  name="edit_td2"><a id="btn-click" class="btn btn-outline btn-update"><i class="fas fa-check"></i></a></td></tr>';
    $("table tbody").prepend(content);
})
$("body").on("click", ".edit-title", function () {
        $(this).parents('h4').html('<input name="edit_h4"><a class="btn btn-outline update-title"><i class="fas fa-check"></i></a>');
        $(".title-header").html('<input name="edit_h3">');
})
$("body").on("click", ".update-title", function () {
   var edith4 = $(".title-company").find('input[name="edit_h4"]').val();
   var edith3 = $(".title-header").find('input[name="edit_h3"]').val();
   $(".title-company").html('<span>'+edith4+'</span><a class="btn btn-outline edit-title"><i class="far fa-edit"></i></a>');
   $(".title-header").html('<span>'+edith3+'</span>');
})
