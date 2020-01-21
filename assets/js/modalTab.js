$(".nav-tabs").on("click", "a", function(e){
    e.preventDefault();
    $(this).tab('show');
})
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });

$('.add-contact').click(function(e) {
    e.preventDefault();
    var id = $(".nav-tabs").children().length; //think about it ;)
    $(this).closest('li').before('<li><a href="#contact_'+id+'">New Tab</a><span>x</span></li>');
    $('.tab-content').append('<div class="tab-pane" id="contact_'+id+'">Contact Form: New Contact '+id+'</div>');
});