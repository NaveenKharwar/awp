const agilityToggler = document.querySelector( '.agility_hamburger' );
const mobileNav = document.querySelector( '.mobile-navigation' );
const mobileSubMenuButton = document.querySelectorAll( '.mobile-navigation .menu-item-has-children' );

agilityToggler.addEventListener( 'click', ( ) => {
	agilityToggler.classList.toggle( 'open-humberger' );
	mobileNav.classList.toggle( 'open-mobile-nav' );
} );

// Adding Dropdown icon
const iconButton = '<button id="sub-menu-dropdown"  type="button" role="button" aria-controls="submenu" aria-expanded="false" aria-label="open"><i class="bx bx-chevron-down"></i></button>';
mobileSubMenuButton.forEach( ( icon ) =>
	icon.insertAdjacentHTML( 'afterbegin', iconButton )
);

// Mobile dropdown for submenu
const mobileSubMenu = document.querySelectorAll( '#mobile_agilitywp_nav_menu .menu-item-has-children' );

for ( let i = 0; i < mobileSubMenu.length; i++ ) {
	mobileSubMenu[ i ].addEventListener( 'click', () => {
		mobileSubMenu[ i ].classList.toggle( 'dropdown-show' );
	} );
}
