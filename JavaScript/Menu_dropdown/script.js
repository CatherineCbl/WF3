var buttonElement = document.getElementById('my-button');
var list = document.getElementById('dropdown-list');


function showDropdown() {
	if(list.style.display=='block') {
  		list.style.display='none';
  	}
  	else {
  		list.style.display='block';
  	}
}


function hideDropdown(event) {
	if(event.target!=buttonElement) {
		list.style.display='none';
    }

}


buttonElement.addEventListener('click', showDropdown);
document.addEventListener('click', hideDropdown)
