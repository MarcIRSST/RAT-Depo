jQuery(document).ready(function ($) {
    if ($(".accordion").length) {
        faqShowing();
    }

    function faqShowing () {
        var faqBox = $('.accordion .container');
        faqBox.each(function () {
            const self = $(this);
            const trigger = self.find('.trigger');
            const content = self.find('.content');
            $.each(trigger, function () {
                $(this).click(function () {
                    self.toggleClass('active');
                    content.slideToggle(300);
                });
            });
        });
    }
});
