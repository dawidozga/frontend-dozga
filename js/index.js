import '../scss/style.scss';

( function( $ ) {

	/**
	 * Document ready function
	 */
    $(document).ready(function () {

        const allFiltercCategories = $('.filter__title');
        const allCaseStudies = $('.casestudy');

        $(allFiltercCategories).click(function() {
            filterCaseStudies(this);
        });

        function filterCaseStudies(item) {
            changeActivePosition(item);
            for (let i = 0; i < allCaseStudies.length; i++) {
                if (allCaseStudies[i].classList.contains($(item).attr('id'))) {
                    $(allCaseStudies[i]).css('display', 'block');
                } else {
                    $(allCaseStudies[i]).css('display', 'none');
                }
            }
        }

        function changeActivePosition(item) {
            $(allFiltercCategories).removeClass('active');
            $(item).addClass('active');
        }
        
    });
    
} )( jQuery );
