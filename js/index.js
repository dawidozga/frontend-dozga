"use strict";

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
			for (const caseStudy of allCaseStudies) {
				if(caseStudy.classList.contains($(item).attr('id'))) {
                    $(caseStudy).css('display', 'block');
                } else {
                    $(caseStudy).css('display', 'none');
                }
			}
        }

        function changeActivePosition(item) {
            $(allFiltercCategories).removeClass('active');
            $(item).addClass('active');
        }
        
    });
    
} )( jQuery );