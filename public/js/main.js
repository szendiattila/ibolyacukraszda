$(function () {
    $('.sem').each(function () {
        $(this).html($(this).html() + '<a href="mailto:' + $(this).attr('data-e0') + '@' + $(this).attr('data-e1') + '.' + $(this).attr('data-e2') + '" target="\_top" class="footerLink"> ' +
            $(this).attr('data-e0') + '@' + $(this).attr('data-e1') + '.' + $(this).attr('data-e2')
            + '</a>');
    });
});