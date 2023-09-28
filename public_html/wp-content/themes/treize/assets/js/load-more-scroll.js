/* global updatePostList */
jQuery(function ($) {
    const $itemContainer = $('#container-items-to-be-loaded-in');
    const $loadingAnim = $('.spinner-container');
    let canBeLoaded = true;
    let bottomOffset = $itemContainer.height() - $itemContainer.scrollTop();

    // section if using checkbox filter
    const checkedFilters = [];
    const multibox = $('#checkbox-multi-filter');
    const taxonomies = [];

    if (multibox) {
        const titles = multibox.find('.title');
        titles.each(function () {
            const taxonomy = $(this).attr('data-taxonomies');
            taxonomies.push(taxonomy);
        });
        $('input').on('click', function () {
            const value = $(this).val();

            if (checkedFilters.includes(value)) {
                const index = checkedFilters.indexOf(value);
                checkedFilters.splice(index, 1);
            } else {
                checkedFilters.push(value);
            }

            ajaxCall(true);
        });
    }

    $(window).scroll(function () {
        if (
            $(document).scrollTop() + $(window).height() > $(document).height() - bottomOffset &&
            canBeLoaded === true
        ) {
            ajaxCall();
        }
    });

    function ajaxCall (categoryChanged = false) {
        const data = {
            action: 'loadmore',
            categoryChanged: categoryChanged,
            taxonomies: taxonomies,
            query: updatePostList.posts,
            page: updatePostList.current_page,
            path: $itemContainer.attr('data-path'),
            checkedFilters: checkedFilters
        };

        $.ajax({
            url: updatePostList.ajaxurl,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                canBeLoaded = false;

                if (updatePostList.current_page < updatePostList.max_page) {
                    $loadingAnim.addClass('loading');
                }
            },
            success: function (data) {
                canBeLoaded = true;

                if (data) {
                    updatePostList.current_page++;

                    if (categoryChanged) {
                        updatePostList.current_page = 1;
                        $itemContainer.html(data);
                    } else {
                        $itemContainer.append(data);
                    }

                    const generatedPosts = $itemContainer.find('.generated');
                    gsap.fromTo(
                        generatedPosts,
                        {
                            opacity: 0,
                            y: 100
                        },
                        {
                            opacity: 1,
                            y: 0,
                            duration: 1
                        }
                    );
                    generatedPosts.removeClass('generated');
                }
            },
            complete: function () {
                $loadingAnim.removeClass('loading');

                if (categoryChanged) {
                    bottomOffset = $itemContainer.height() - $itemContainer.scrollTop(); // reset offset
                }
            }
        });
    }
});
