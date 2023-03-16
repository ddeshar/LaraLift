(function($) {
  'use strict';

  // Define the sidebarMenu function as a jQuery plugin
  $.sidebarMenu = function(menu) {
    // Define constants
    const animationSpeed = 300;
    const subMenuSelector = '.sidebar-submenu';

    // Function to set the active menu item based on the current URL
    function setActiveMenu() {
      const currentUrl = window.location.href.split(/[?#]/)[0];
      $(menu).find('li a').each(function() {
        const menuUrl = $(this).attr('href');
        if (currentUrl === menuUrl) {
          $(this).parent().addClass('active');
          $(this).parents('ul').addClass('menu-open');
          $(this).parents('li').addClass('active');
        }
      });
    }

    // Call setActiveMenu function to set the active menu item
    setActiveMenu();

    // Attach a click event handler for 'li a' elements within the menu
    $(menu).on('click', 'li a', function(e) {
      // Cache the clicked element
      const $this = $(this);
      // Get the next sibling element of the clicked element
      const checkElement = $this.next();

      // Check if the next element is a submenu and is visible
      if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
        // Slide up the submenu and remove the 'menu-open' class
        checkElement.slideUp(animationSpeed, function() {
          checkElement.removeClass('menu-open');
        });
        // Remove the 'active' class from the parent li
        checkElement.parent("li").removeClass("active");
      }
      // Check if the next element is a submenu and is not visible
      else if (checkElement.is(subMenuSelector) && (!checkElement.is(':visible'))) {
        // Get the closest parent ul of the clicked element
        const parent = $this.parents('ul').first();
        // Slide up all visible submenus within the parent and remove the 'menu-open' class
        const ul = parent.find('ul:visible').slideUp(animationSpeed);
        ul.removeClass('menu-open');
        // Get the parent li of the clicked element
        const parent_li = $this.parent("li");

        // Slide down the target submenu, add the 'menu-open' class, and update the active state
        checkElement.slideDown(animationSpeed, function() {
          checkElement.addClass('menu-open');
          parent.find('li.active').removeClass('active');
          parent_li.addClass('active');
        });
      }

      // Prevent the default action if the clicked element is a submenu
      if (checkElement.is(subMenuSelector)) {
        e.preventDefault();
      }
    });
  };
})(jQuery);