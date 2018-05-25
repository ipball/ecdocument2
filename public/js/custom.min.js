/* handle modal form */
$('body').on('click', '.btn-create', function(e){  
    link = $(this).data('href');
    modalName = $(this).data('modal-name');      
    modalShow(e, link, modalName);
});
$('body').on('click', '.btn-edit', function(e){
    link = $(this).data('href');
    modalName = $(this).data('modal-name');
    modalShow(e, link, modalName);
});

$('#ajaxModal, #ajaxLargeModal').on('hidden.bs.modal', function () {    
    $('.modal-content').empty();
    $(this).removeData('bs.modal');
});

$('#ajaxModal, #ajaxLargeModal').on('shown.bs.modal', function (e) {
    $.LoadingOverlay('hide');
});

$('body').on('click', '.btn-edit', function(){
    loadingCustom();
});

$('body').on('click', '.btn-create', function(){
    loadingCustom();
});

var loadingCustom = function () {
    $.LoadingOverlay('show', {
        image: '',
        fontawesome: 'fa fa-spinner fa-spin',
        background: 'rgba(0, 0, 0, 0.6)',
        fontawesomeColor: '#ffffff'        
    });
}

var modalShow = function(e, link, modalName){
    e.preventDefault();
    $.get(link, function(data){
        $('#'+modalName).find('.modal-content').html(data);
        $('#'+modalName).modal('show');
    });
}