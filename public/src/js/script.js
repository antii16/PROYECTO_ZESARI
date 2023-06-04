var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
	if (down) {
		box.style.height  = '0px';
		box.style.opacity = 0;
		down = false;
	}else {
		box.style.height  = '660px';
		// box.style.opacity = 1;
		box.style.visibility  = 'collapse';
		down = true;
	}
}