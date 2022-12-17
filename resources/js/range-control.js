function onInputChange() {
	const val = this.value;
	this.previousElementSibling.innerHTML = val;
	this.value = val;
}

document.addEventListener( 'DOMContentLoaded', function() {
	const inputs = document.querySelectorAll( 'input[data-input-type]' );
	for ( let i = 0; i < inputs.length; i++ ) {
		inputs[ i ].addEventListener( 'input', onInputChange );
		inputs[ i ].addEventListener( 'change', onInputChange );
	}
} );

function updateRangeValue( val ) {
	document.getElementById( 'current-range-value' ).innerHTML = val;
}
